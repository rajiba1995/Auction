<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\MasterContract;
use App\Contracts\BuyerDashboardContract;
use App\Models\Product;
use App\Models\Category;
use App\Models\WatchList;
use App\Models\GroupWatchList;
use App\Models\UserImage;
use App\Models\SellerReport;
use App\Models\UserDocument;
use App\Models\Collection;
use App\Models\UserAdditionalDocument;
use App\Models\RequirementConsumption;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{

    protected $userRepository;

    public function __construct(UserContract $userRepository, MasterContract $MasterRepository, BuyerDashboardContract $BuyerDashboardRepository) {
        $this->userRepository = $userRepository;
        $this->MasterRepository = $MasterRepository;
        $this->BuyerDashboardRepository = $BuyerDashboardRepository;
    }

    public function AuthCheck(){
        if(Auth::guard('web')->check()){
            return Auth::guard('web')->user();
        } else{
           return "";
        }
    }

    public function profile(){
        $data = $this->AuthCheck();
        $location = '';
        $keyword = '';
        return view('front.user.profile', compact('data', 'location', 'keyword'));
    }
    public function ProfileEdit(){
        $data = $this->AuthCheck();
        $business_data = $this->userRepository->getAllBusiness();
        $legal_status_data = $this->userRepository->getAllLegalStatus();
        // dd($business_data);
        return view('front.user.profile_update', compact('data','business_data','legal_status_data'));
    }
    public function ProfileUpdate(Request $request){
        // dd($request->all());
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'business_name' => 'required',
            'business_type' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'employee' => 'required',
            'Establishment_year' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            // Add more rules for other fields as needed
        ];
        
        // Define custom error messages
        $customMessages = [
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'business_name.required' => 'The business name field is required.',
            'business_type.required' => 'Please select a business type.',
            'address.required' => 'The address field is required.',
            'state.required' => 'Please select a state.',
            'city.required' => 'The city field is required.',
            'pincode.required' => 'The pincode field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.numeric' => 'Please enter a valid phone number.',
            'employee.required' => 'Please enter total no, of Employee.',
            'Establishment_year.required' => 'Please enter establishment year.',
            // Add more custom messages for specific fields and rules as needed
        ];
        
        // Validate the data
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $params = $request->except('_token');
            $data = $this->userRepository->updateUser($request, $params);
            return redirect()->route('user.profile')->with('success', 'Your profile data updated successfully');
        }
    }
    public function ProductAndService(){
        $data = $this->AuthCheck();
        $Product = Product::where('user_id', $this->AuthCheck()->id)->get();
        return view('front.user.product_and_service', compact('Product', 'data'));
    }
    public function ProductAndServiceAdd(){
        $data = $this->AuthCheck();
        $AllCollection = $this->MasterRepository->getAllActiveCollections();
        $AllCategory = $this->MasterRepository->getAllActiveCategories();
        return view('front.user.product_and_service_add', compact('AllCollection', 'AllCategory', 'data'));
    }
    public function ProductAndServiceEdit($id){
        $data = $this->AuthCheck();
        $Product = Product::findOrFail($id);
        $AllCollection = $this->MasterRepository->getAllActiveCollections();
        $AllCategory = $this->MasterRepository->getAllActiveCategories();
        return view('front.user.product_and_service_edit', compact('AllCollection', 'AllCategory', 'data', 'Product'));
    }
    public function CollectionWiseCategory(Request $request){
        $data = $this->MasterRepository->CollectionWiseCategoryData($request->category);
        return response()->json(["status"=>200, 'data'=>$data]);
    }
    public function CollectionWiseCategoryBytitle(Request $request){
        $Collection = Collection::where('title', $request->category)->first();
        $data = $this->MasterRepository->CollectionWiseCategoryDataByTitle($Collection->id);
        return response()->json(["status"=>200, 'data'=>$data]);
    }
    public function ProductAndServiceStore(Request $request){
        // dd($request->all());
        $rules = [
            // Define validation rules for product details
            'product_image' => 'nullable:prodserv,productdetails|image',
            'product_name' => 'required_if:prodserv,productdetails',
            // 'category' => 'required_if:prodserv,productdetails',
            // 'sub_category' => 'required_if:prodserv,productdetails',
            'product_description' => 'required_if:prodserv,productdetails',
            'price' => 'required_if:prodserv,productdetails',
        
            // Define validation rules for service details
            'service_image' => 'nullable:prodserv,servicedetails|image|mimes:jpeg,png,jpg,gif',
            'service_name' => 'required_if:prodserv,servicedetails',
            // 'service_category' => 'required_if:prodserv,servicedetails',
            // 'service_sub_category' => 'required_if:prodserv,servicedetails',
            'service_description' => 'required_if:prodserv,servicedetails',
            'service_price' => 'required_if:prodserv,servicedetails',
        ];
        //for product
        if($request->prodserv == "productdetails"){ 
            if (request()->has('others_doc_product')) {
                $rules['other_category_product'] = 'required';
                $rules['other_sub_category_product'] = 'required';
            } else {
                // If 'others_doc_product' doesn't exist, require 'category' and 'sub_category'
                $rules['category'] = 'required';
                $rules['sub_category'] = 'required';
            }
        }
        // For Service 
        if($request->prodserv == "servicedetails"){
            if (request()->has('others_doc_service')) {
                $rules['other_category_service'] = 'required';
                $rules['other_sub_category_service'] = 'required';
            } else {
                // If 'others_doc_service' doesn't exist, require 'category' and 'sub_category'
                $rules['service_category'] = 'required';
                $rules['service_sub_category'] = 'required';
            }
        }
        
        
        $customMessages = [
            // Custom messages for product details validation
            'product_image.required_if' => 'The product image is required',
            'product_image.image' => 'The product image must be an image file.',
            'product_name.required_if' => 'The product name field is required',
            'product_name.regex' => 'The product name field should only contain letters, numbers, spaces, and hyphens.',
            'category.required_if' => 'The category field is required',
            'sub_category.required_if' => 'The sub category field is required',
            'product_description.required_if' => 'The product description field is required',
            'price.required_if' => 'The price field is required',
        
            // Custom messages for service details validation
            'service_image.required_if' => 'The service image is required',
            'service_image.image' => 'The service image must be an image file.',
            'service_image.mimes' => 'The service image must be a file of type: jpeg, png, jpg, gif.',
            'service_name.required_if' => 'The service name field is required',
            'service_name.regex' => 'The service name field should only contain letters, numbers, spaces, and hyphens.',
            'service_category.required_if' => 'The service category field is required',
            'service_sub_category.required_if' => 'The service sub category field is required',
            'service_description.required_if' => 'The service description field is required',
            'service_price.required_if' => 'The service price field is required',
        ];        
    
        // Validate the request
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('prodserv', $request->prodserv);
        }else{
            // try {
                    // $User = $this->AuthCheck();
                    // Start a database transaction
                // DB::beginTransaction();

                    
                $data =new Product;
                $data->type = $request->prodserv=="productdetails"?"Product":"Service";
                $data->title = $request->prodserv=="productdetails"?$request->product_name:$request->service_name;
                $data->slug = slugGenerate($data->title, 'products'); 
                //checking during product insert
                if (request()->has('others_doc_product')) {
                    $category = Collection::where('title', $request->other_category_product)->first();
                    if($category){
                        return redirect()->back()->with('error', 'This category already exists');
                    }
            
                    $category = new Collection;
                    $category->title = $request->other_category_product;
                    $category->image = asset('frontend/assets/images/building.png');
                    $category->created_by = 2;
                    $category->status = 3;
                    $category->save();
            
                    $sub_category = new Category;
                    $sub_category->title = $request->other_sub_category_product;
                    $sub_category->image = asset('frontend/assets/images/building.png');
                    $sub_category->collection_id = $category->id;
                    $sub_category->created_by = 2;
                    $sub_category->save();

                    $data->category_id = $category->id;
                    $data->sub_category_id= $sub_category->id;
                }else{
                    $data->category_id = $request->category?$request->category:$request->service_category;
                    $data->sub_category_id = $request->sub_category?$request->sub_category:$request->service_sub_category;
                }

                //checking during service insert
                if (request()->has('others_doc_service')) {
                    $category = Collection::where('title', $request->other_category_service)->first();
                    if ($category) {
                        return redirect()->back()->with('error', 'This category already exists');
                    }
            
                    $category = new Collection;         
                    $category->title = $request->other_category_service;
                    $category->image = 'frontend/assets/images/building.png';
                    $category->created_by = 2;
                    $category->status = 3;
                    $category->save();
            
                    $sub_category = new Category;
                    $sub_category->title = $request->other_sub_category_service;
                    $sub_category->image = 'frontend/assets/images/building.png';
                    $sub_category->collection_id = $category->id;
                    $sub_category->created_by = 2;
                    $sub_category->save();

                    $data->category_id = $category->id;
                    $data->sub_category_id = $sub_category->id;
                }else{
                    $data->category_id = $request->category?$request->category:$request->service_category;
                    $data->sub_category_id = $request->sub_category?$request->sub_category:$request->service_sub_category;
                }

                
                $data->description = $request->prodserv=="productdetails"?$request->product_description:$request->service_description;
                $data->price = $request->prodserv=="productdetails"?$request->price:$request->service_price;
                $data->specifications = $request->specifications;
                $data->image = asset('frontend/assets/images/building.png');
                $data->user_id =$this->AuthCheck()->id;

                if ($request->hasFile('product_image')) {
                    $file = $request->file('product_image');
                    $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
                    $filePath = 'uploads/product/' . $fileName; // Construct full path
                    $file->move(public_path('uploads/product'), $fileName);
                    $data->image = $filePath;
                }
                if ($request->hasFile('service_image')) {
                    $file = $request->file('service_image');
                    $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
                    $filePath = 'uploads/product/' . $fileName; // Construct full path
                    $file->move(public_path('uploads/product'), $fileName);
                    $data->image = $filePath;
                }
                $data->save();
                // Commit the transaction if all operations succeed
                // DB::commit();
                

                return redirect()->route("user.product_and_service")->with('success', 'New '.$data->type . ' added successfully');
            // } catch (\Exception $e) {
            //     // Rollback the transaction and handle the exception
            //     // DB::rollBack();
            //     return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
            // }
        }
    }
    public function ProductAndServiceUpdate(Request $request){
        // dd($request->all());
        $rules = [
            // Define validation rules for product details
            'product_image' => 'nullable|image',
            'service_name' => 'required_if:prodserv,productdetails',
            'category' => 'required_if:prodserv,productdetails',
            'sub_category' => 'required_if:prodserv,productdetails',
            'product_description' => 'required_if:prodserv,productdetails',
            'price' => 'required_if:prodserv,productdetails',
        
            // Define validation rules for service details
            'service_image' => 'nullable|image',
            'service_name' => 'required_if:prodserv,servicedetails',
            'service_category' => 'required_if:prodserv,servicedetails',
            'service_sub_category' => 'required_if:prodserv,servicedetails',
            'service_description' => 'required_if:prodserv,servicedetails',
            'service_price' => 'required_if:prodserv,servicedetails',
        ];
        
        $customMessages = [
            // Custom messages for product details validation
            'product_image.image' => 'The product image must be an image file.',
            'product_name.required_if' => 'The product name field is required',
            'product_name.regex' => 'The product name field should only contain letters, numbers, spaces, and hyphens.',
            'category.required_if' => 'The category field is required',
            'sub_category.required_if' => 'The sub category field is required',
            'product_description.required_if' => 'The product description field is required',
            'price.required_if' => 'The price field is required',
        
            // Custom messages for service details validation
            'service_image.image' => 'The service image must be an image file.',
            'service_name.required_if' => 'The service name field is required',
            'service_name.regex' => 'The product name field should only contain letters, numbers, spaces, and hyphens.',
            'service_category.required_if' => 'The service category field is required',
            'service_sub_category.required_if' => 'The service sub category field is required',
            'service_description.required_if' => 'The service description field is required',
            'service_price.required_if' => 'The service price field is required',
        ];
        
    
        // Validate the request
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('prodserv', $request->prodserv);
        }else{
            $data =Product::findOrFail($request->id);
            $data->type = $request->prodserv=="productdetails"?"Product":"Service";
            $data->title = $request->prodserv=="productdetails"?$request->product_name:$request->service_name;
            $data->slug = slugGenerate($data->title, 'products'); 
            $data->category_id = $request->prodserv=="productdetails"?$request->category:$request->service_category;
            $data->sub_category_id = $request->prodserv=="productdetails"?$request->sub_category:$request->service_sub_category;
            $data->description = $request->prodserv=="productdetails"?$request->product_description:$request->service_description;
            $data->price = $request->prodserv=="productdetails"?$request->price:$request->service_price;
            $data->specifications = $request->specifications;
            $data->user_id =$this->AuthCheck()->id;
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
                $filePath = 'uploads/product/' . $fileName; // Construct full path
                $file->move(public_path('uploads/product'), $fileName);
                $data->image = $filePath;
            }
            if ($request->hasFile('service_image')) {
                $file = $request->file('service_image');
                $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
                $filePath = 'uploads/product/' . $fileName; // Construct full path
                $file->move(public_path('uploads/product'), $fileName);
                $data->image = $filePath;
            }
            $data->save();
            return redirect()->back()->with('success', 'This '.$data->type . ' updated successfully');
        }
    }
    public function RatingAndReview(){
        $data = $this->AuthCheck();
        return view('front.user.rating', compact('data'));
    }
    public function RConsumption(){ 
        $data = $this->AuthCheck();
        $consumption = RequirementConsumption::where('user_id', $data->id)->get();
        return view('front.user.requirement_consumption', compact('data', 'consumption'));
    }
    public function RConsumptionAdd(){
        $data = $this->AuthCheck();
        $AllCollection = $this->MasterRepository->getAllActiveCollections();
        $AllCategory = $this->MasterRepository->getAllActiveCategories();
        return view('front.user.requirement_consumption_add', compact('data', 'AllCollection', 'AllCategory'));
    }
    public function RConsumptionStore(Request $request){
        // dd($request->all());
        $rules = [
            'product_name' => 'required',
        ];
        if (request()->has('others_doc')) {
            $rules['other_category'] = 'required';
            $rules['other_sub_category'] = 'required';
        } else {
            // If 'others_doc' doesn't exist, require 'category' and 'sub_category'
            $rules['category'] = 'required';
            $rules['sub_category'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            try {
                $User = $this->AuthCheck();
                // Start a database transaction
                DB::beginTransaction();
            
                $data = new RequirementConsumption();
                $data->type = $request->consumption;
                $data->name = $request->product_name;
            
                if (request()->has('others_doc')) {
                    $category = Collection::where('title', $request->other_category)->first();
                    if ($category) {
                        // Rollback the transaction and return with error message if category already exists
                        DB::rollBack();
                        return redirect()->back()->with('error', 'This category already exists');
                    }
            
                    $category = new Collection;
                    $category->title = $request->other_category;
                    $category->created_by = 2;
                    $category->status = 3;
                    $category->save();
            
                    $sub_category = new Category;
                    $sub_category->title = $request->other_sub_category;
                    $sub_category->collection_id = $category->id;
                    $sub_category->created_by = 2;
                    $sub_category->save();
            
                    $data->category = $category->id;
                    $data->sub_category = $sub_category->id;
                } else {
                    $data->category = $request->category;
                    $data->sub_category = $request->sub_category;
                }
                $data->user_id = $User->id;
                $data->save();
            
                // Commit the transaction if all operations succeed
                DB::commit();
            
                return redirect()->route('user.requirements_and_consumption')->with('success', 'New Data added successfully');
            } catch (\Exception $e) {
                // Rollback the transaction and handle the exception
                DB::rollBack();
                return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
            }
        }
    }
    public function RConsumptionDelete($id){
        $WatchList = RequirementConsumption::findOrFail($id);
        $WatchList->delete();
        return redirect()->back();
    }

    
    public function performance_analytics(){
        $data = $this->AuthCheck();
        return view('front.user.performance_analytics', compact('data'));
    }
    public function photos_and_documents(){
        $data = $this->AuthCheck();
        $AllImages = $this->userRepository->getUserAllImages($data->id);
        $user_document = $this->userRepository->getUserAllData($data->id);
        return view('front.user.photos_and_documents', compact('data', 'AllImages', 'user_document'));
    }
    public function payment_management(){
        $data = $this->AuthCheck();
        return view('front.user.payment_management', compact('data'));
    }
    public function settings(){
        $data = $this->AuthCheck();
        return view('front.user.settings', compact('data'));
    }
    public function MyWatchlist(Request $request){
        $data = $this->AuthCheck();
        $group_slug = $request->group ? $request->group : '';
        if($group_slug){
            $ExistGroupWatch = GroupWatchList::where('slug', $group_slug)->where('created_by', $data->id)->first();
            if(empty($ExistGroupWatch)){
                return abort(404);
            }
        }
       
        $existing_inquiries= $this->BuyerDashboardRepository->get_all_existing_inquiries_by_user($data->id);
        $WatchList = WatchList::with('SellerData')->where('buyer_id', $data->id)->where('group_id', null)->get();
        $groupWatchList = GroupWatchList::orderBy('group_name', 'ASC')->where('created_by',$data->id)->get();
        return view('front.user.watchlist', compact('WatchList','groupWatchList', 'existing_inquiries'));
    }

    public function seller_buk_upload_on_group_watchlist(Request $request){
        $data = $this->AuthCheck();
        $GroupWatchList = GroupWatchList::where('slug', $request->group_slug)->where('created_by', $data->id)->first();
        if($GroupWatchList){
            foreach($request->seller as $key =>$item){
                $WatchList = WatchList::where('buyer_id', $data->id)->where('seller_id', $item)->where('group_id', null)->first();
                $WatchList->group_id = $GroupWatchList->id;
                $WatchList->save();
            }
            $route = route('user.watchlist.my_watchlist_by_group', $GroupWatchList->slug);
            return response()->json(['status'=>200, 'route'=>$route]);
        }else{
            return response()->json(['status'=>400]);
        }
    }
    public function MyWatchlistDataSore(Request $request){
        $fetch = WatchList::where('buyer_id', $request->buyer_id)->where('seller_id', $request->seller_id)->where('group_id', null)->first();
        if($fetch){
            return redirect()->back()->with('warning', 'The seller is already on the watchlist..');
        }else{
            $WatchList = new WatchList;
            $WatchList->seller_id =$request->seller_id;
            $WatchList->buyer_id =$request->buyer_id;
            $WatchList->save();
            return redirect()->back()->with('success', 'Seller has been successfully added to the watchlist..');
        }
    }
    public function UserToSellerReportStore(Request $request)
    {
        $request->validate([
            'report_message' => 'required'
        ], [
            'report_message.required' => 'You must leave a report message before submitting.'
        ]);
    
        $report = new SellerReport();   
        $report->seller_id = $request->seller_id;    
        $report->report_by = $request->user_id;
        $report->content = $request->report_message;
        $report->save();
    
        return back()->with('success', 'Report Submitted successfully.');
    }
    
    public function MyGroupWatchlistDataSore(Request $request){
        $fetch = WatchList::where('buyer_id', $request->buyer_id)->where('seller_id', $request->seller_id)->where('group_id',$request->group_id)->first();
        if($fetch){
            return redirect()->back()->with('warning', 'The seller is already on the watchlist..');
        }else{
            $WatchList = new WatchList;
            $WatchList->seller_id =$request->seller_id;
            $WatchList->buyer_id =$request->buyer_id;
            $WatchList->group_id =$request->group_id;
            $WatchList->status =2;
            $WatchList->save();
            return redirect()->back()->with('success', 'Seller has been successfully added to the watchlist..');
        }
    }

    public function CreateGroupWatchlist(Request $request){
    $data = $this->AuthCheck();
    $groupName = ucfirst($request->group_watchlist_name);
    $fetch = GroupWatchList::where('created_by', $data->id)->where('group_name',$groupName)->first();
    if($fetch){
        return response()->json(['status'=>400]);
    }else{
        $groupWatchList = new GroupWatchList;
        $groupWatchList->created_by =$data->id;
        $groupWatchList->group_name =$groupName;
        $groupWatchList->slug =GroupslugGenerate($groupName, 'group_watchlist');
        $groupWatchList->save();
        return response()->json(['status'=>200]);
    }
    }
    public function UpdateGroupWatchlist(Request $request){
        $data = $this->AuthCheck();
        $groupName = ucfirst($request->group_watchlist_name);
        $fetch = GroupWatchList::where('created_by', $data->id)->where('group_name',$groupName)->where('id', '!=', $request->id)->first();
        if($fetch){
            return response()->json(['status'=>400]);
        }else{
            $update = GroupWatchList::findOrFail($request->id);
            $update->group_name = $groupName;
            $update->slug =GroupslugGenerateUpdate($groupName, 'group_watchlist', $update->id);
            $update->save();
            return response()->json(['status'=>200]);
        }
    }
    public function DeleteGroupWatchlist(Request $request){
        $groupWatchList = GroupWatchList::findOrFail($request->id);
        // Check if the GroupWatchList is found
        if ($groupWatchList) {
            $watchList = WatchList::where('group_id', $groupWatchList->id)->get();
            // Delete related WatchList records
            $watchList->each->delete();
            // Delete the GroupWatchList record
            $groupWatchList->delete();
        }
        return response()->json(['status'=>200]);     
    }
    public function DeleteSingleWatchlist(Request $request){
        $watchList = WatchList::findOrFail($request->id);
        $watchList->delete();
        return response()->json(['status'=>200]);     
    }
    public function MyWatchlistDataDelete($id){
        $WatchList = WatchList::findOrFail($id);
        $WatchList->delete();
        return redirect()->back();
    }
    
    public function photos_and_documents_edit(){
        $data = $this->AuthCheck();
        $AllImages = $this->userRepository->getUserAllImages($data->id);
        $user_document = $this->userRepository->getUserAllData($data->id);
        return view('front.user.photos_and_documents_edit', compact('data','user_document', 'AllImages'));
    }

    public function photos_and_documents_update(Request $request){  
        $user = $this->AuthCheck();
        if ($request->hasFile('user_images')) {
            $request->validate([
                'user_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:110240',
            ], [
                'user_images.*.image' => 'The file must be an image.',
                'user_images.*.mimes' => 'The file must be a jpeg, png, jpg, or gif.',
                'user_images.*.max' => 'The file may not be greater than 10 MB in size.',
            ]);
            foreach ($request->file('user_images') as $image) {
                $user_image = new UserImage();
                $filename = "User-images" . rand(10000, 99999) . time() . "." . $image->getClientOriginalExtension();
                $image->move('uploads/userData', $filename);
                $user_image->image = 'uploads/userData/' . $filename;
                $user_image->user_id = $user->id;
                $user_image->save();
            }
        }

        $request->validate([
            'gst_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'gst_number' => 'nullable|string|max:255',
            'pan_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'pan_number' => 'nullable|string|max:255',
            'adhar_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'adhar_number' => 'nullable|string|max:255',
            'trade_license_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'trade_license_number' => 'nullable|string|max:255',
            'cancelled_cheque_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'account_number' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:255',
        ], [
            'gst_file.required' => 'Please upload GST file.',
            'gst_file.file' => 'The uploaded GST file is invalid.',
            'gst_file.mimes' => 'The GST file must be a PDF, DOC.',
            'gst_file.max' => 'The GST file may not be greater than 2MB in size.',
            'gst_number.required' => 'Please enter GST number.',
            'pan_file.required' => 'Please upload PAN file.',
            'pan_file.file' => 'The uploaded PAN file is invalid.',
            'pan_file.mimes' => 'The PAN file must be a PDF, DOC.',
            'pan_file.max' => 'The PAN file may not be greater than 2MB in size.',
            'pan_number.required' => 'Please enter PAN number.',
            'adhar_file.required' => 'Please upload Adhar file.',
            'adhar_file.file' => 'The uploaded Adhar file is invalid.',
            'adhar_file.mimes' => 'The Adhar file must be a PDF, DOC.',
            'adhar_file.max' => 'The Adhar file may not be greater than 2MB in size.',
            'adhar_number.required' => 'Please enter Adhar number.',
            'trade_license_file.required' => 'Please upload Trade License file.',
            'trade_license_file.file' => 'The uploaded Trade License file is invalid.',
            'trade_license_file.mimes' => 'The Trade License file must be a PDF, DOC.',
            'trade_license_file.max' => 'The Trade License file may not be greater than 2MB in size.',
            'trade_license_number.required' => 'Please enter Trade License number.',
            'cancelled_cheque_file.required' => 'Please upload Cancelled Cheque file.',
            'cancelled_cheque_file.file' => 'The uploaded Cancelled Cheque file is invalid.',
            'cancelled_cheque_file.mimes' => 'The Cancelled Cheque file must be a PDF, DOC.',
            'cancelled_cheque_file.max' => 'The Cancelled Cheque file may not be greater than 2MB in size.',
            'account_number.required' => 'Please enter Account number.',
            'ifsc_code.required' => 'Please enter IFSC code.',
        ]);

        $ExistData = UserDocument::where('user_id', $user->id)->first();
        if($ExistData){
            $user_document = UserDocument::findOrFail($ExistData->id);
        }else{
            $user_document = new UserDocument;
        }
       
        if (isset($request->gst_file)) {
            $file = $request->gst_file;
            $filename = rand(10000, 99999) . time() . "." . $file->getClientOriginalName();
            $file->move('uploads/userData', $filename);
            $user_document->gst_file = 'uploads/userData/' . $filename;
        }
        if (isset($request->pan_file)) {
            $file = $request->pan_file;
            $filename = rand(10000, 99999) . time() . "." . $file->getClientOriginalName();
            $file->move('uploads/userData', $filename);
            $user_document->pan_file = 'uploads/userData/' . $filename;
        }
        if (isset($request->adhar_file)) {
            $file = $request->adhar_file;
            $filename = rand(10000, 99999) . time() . "." . $file->getClientOriginalName();
            $file->move('uploads/userData', $filename);
            $user_document->adhar_file = 'uploads/userData/' . $filename;
        }
        if (isset($request->trade_license_file)) {
            $file = $request->trade_license_file;
            $filename = rand(10000, 99999) . time() . "." . $file->getClientOriginalName();
            $file->move('uploads/userData', $filename);
            $user_document->trade_license_file = 'uploads/userData/' . $filename;
        }
        if (isset($request->cancelled_cheque_file)) {
            $file = $request->cancelled_cheque_file;
            $filename = rand(10000, 99999) . time() . "." . $file->getClientOriginalName();
            $file->move('uploads/userData', $filename);
            $user_document->cancelled_cheque_file = 'uploads/userData/' . $filename;
        }
        $user_document->gst_number = $request->gst_number;
        $user_document->user_id = $user->id;
        $user_document->pan_number = $request->pan_number;
        $user_document->adhar_number = $request->adhar_number;
        $user_document->trade_license_number = $request->trade_license_number;
        $user_document->account_number = $request->account_number;
        $user_document->ifsc_code = $request->ifsc_code;
        $user_document->save();
        if(count($request->additional_documents)>0){
            foreach ($request->additional_documents as $key => $value) {
                if($value){
                    $AddiData = new UserAdditionalDocument;
                    $AddiData->user_id = $user->id;
                    if (isset($request->additional_document_file[$key])) {
                        $file = $request->additional_document_file[$key];
                        $filename = rand(10000, 99999) . time() . "." . $file->getClientOriginalName();
                        $file->move('uploads/userData', $filename);
                        $AddiData->additional_document_file = 'uploads/userData/' . $filename;
                    }
                    $AddiData->additional_documents = $value;
                    $AddiData->save();
                }
                
            }
        }
        return back()->with('success', 'Documents uploaded successfully.');
    }

    public function photos_and_documents_delete(Request $request){
        $UserImage = UserImage::findOrFail($request->id);
        $UserImage->delete();
        return response()->json(['status'=>200]);
    }
    public function my_watchlist_by_group($slug){
        $User = $this->AuthCheck();
        $GroupWatchList = GroupWatchList::where('slug', $slug)->where('created_by', $User->id)->first();
        if($GroupWatchList){
            $existing_inquiries= $this->BuyerDashboardRepository->get_all_existing_inquiries_by_user($User->id);
            $WatchList =WatchList::with('SellerData')->where('group_id', $GroupWatchList->id)->get();
             return view('front.user.watchlist_by_group', compact('WatchList', 'GroupWatchList', 'existing_inquiries'));
        }else{
            return redirect()->route('user.watchlist')->with('warning', 'Group not found in your panel. Please enter a valid group name.');
        }
    }
}