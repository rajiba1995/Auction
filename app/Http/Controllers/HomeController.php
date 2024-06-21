<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Collection;
use App\Models\Product;
use App\Models\GroupWatchList;
use App\Models\Category;
use App\Models\Tutorial;
use App\Models\Client;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Models\SocialMedia;
use App\Models\State;
use App\Models\ReviewRating;
use App\Models\City;
use App\Models\User;
use App\Contracts\BuyerDashboardContract;
use App\Models\RequirementConsumption;
use App\Models\Blog;
use App\Models\CoziWhatsapp;
use Illuminate\Support\Str;
use App\Contracts\UserContract;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;




class HomeController extends Controller
{
    protected $userRepository;
    protected $BuyerDashboardRepository;

    public function __construct(UserContract $userRepository, BuyerDashboardContract $BuyerDashboardRepository) {
        $this->userRepository = $userRepository;
        $this->BuyerDashboardRepository = $BuyerDashboardRepository;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {       
        $data = (object)[];
        $data->banners = Banner::orderBy('file_path', 'ASC')->paginate(20);
        // dd($data->banners);  

        $data->collections = Collection::with('categoryDetails')->latest()->where('status', 1)->where('deleted_at', 1)->where('created_by', 1)->limit(2)->get();
        $data->categories = Category::latest()->where('deleted_at', 1)->where('status', 1)->where('created_by', 1)->paginate(20);
        $data->tutorials = Tutorial::latest()->where('deleted_at', 1)->paginate(20);
        $data->clients = Client::latest()->where('deleted_at', 1)->paginate(20);
        $data->feedbacks = Feedback::latest()->where('deleted_at', 1)->paginate(20);
        $data->socialmedias =  SocialMedia::orderBy('title', 'ASC')->paginate(20);
        $data->blogs =  Blog::where('deleted_at', 1)->orderBy('title','ASC')->paginate(20);
        // dd($data->collections);  
        return view('front.index',compact('data'));
    }

    public function UserGlobalMakeSlug(Request $request){
        $location = Str::slug($request->location, '-');
        $keyword = Str::slug($request->keyword, '-');
        $route = route('user.global.filter', [$location,$keyword]);
        return response()->json(['status'=>200, 'route'=>$route]);
    }

    public function UserGlobalMakeSlugParticipant(Request $request){
        // dd($request->all());
        $location = Str::slug($request->location, '-');
        $keyword = Str::slug($request->keyword, '-');
        $category = Str::slug($request->category, '-');
        $sub_category = Str::slug($request->sub_category, '-');
        $route = route('user.global.filter.add_participant', [$location,$keyword,$category,$sub_category]);
        return response()->json(['status'=>200, 'route'=>$route]);
    }
    
    public function Suggestion(Request $request){
        // $location = str_replace('-', ' ', $old_location);
        // $keyword = str_replace('-', ' ', $old_keyword);
        $location = $request->location;
        $keyword = $request->keyword;

        $exist_state = "";
        $exist_city = "";
        $exist_product = "";
        $exist_state = State::where('name', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('name', 'like', '%' . $location . '%')->value('id');
        // Get user IDs of users who have products matching the keyword
        $product_user_ids = Product::where('title', 'like', '%' . $keyword . '%')->pluck('user_id');

        // $userIds = User::where('state', $exist_state)
        //     ->orWhere('city', $exist_city)->whereNotNull('business_name')
        //     ->pluck('id')
        //     ->toArray();
    //     $data = User::where('status',1)->orWhere('state',$exist_state)->orWhere('city', $exist_city)->where(function($query) use ($keyword){
    //         $query->where('name', 'like', '%'.$keyword.'%')
    //        ->orWhere('business_name', 'like', '%'.$keyword.'%')
    //        ->orWhere('mobile', 'like', '%'.$keyword.'%')
    //        ->orWhere('address', 'like', '%'.$keyword.'%')
    //        ->orWhere('pincode', 'like', '%'.$keyword.'%')
    //        ->orWhere('short_bio', 'like', '%'.$keyword.'%')
    //        ->orWhere('business_type', 'like', '%'.$keyword.'%')
    //        ->orWhere('employee', 'like', '%'.$keyword.'%')
    //        ->orWhere('Establishment_year', 'like', '%'.$keyword.'%')
    //        ->orWhere('legal_status', 'like', '%'.$keyword.'%')
    //        ->orWhere('email', 'like', '%'.$keyword.'%');
    //    })->get();
    //    if(count($data) > 0) {
    //     return response()->json($data);
    //    }
    $data = User::where('status', 1)
        ->where(function($query) use ($exist_state, $exist_city) {
            $query->where('state', $exist_state)
                  ->orWhere('city', $exist_city);
        })
        ->where(function($query) use ($keyword,$product_user_ids) {
            $query->where('name', 'like', '%'.$keyword.'%')
                  ->orWhere('business_name', 'like', '%'.$keyword.'%')
                  ->orWhere('mobile', 'like', '%'.$keyword.'%')
                  ->orWhere('address', 'like', '%'.$keyword.'%')
                  ->orWhere('pincode', 'like', '%'.$keyword.'%')
                  ->orWhere('short_bio', 'like', '%'.$keyword.'%')
                  ->orWhere('business_type', 'like', '%'.$keyword.'%')
                  ->orWhere('employee', 'like', '%'.$keyword.'%')
                  ->orWhere('Establishment_year', 'like', '%'.$keyword.'%')
                  ->orWhere('legal_status', 'like', '%'.$keyword.'%')
                  ->orWhere('email', 'like', '%'.$keyword.'%')
                  ->orWhereIn('id', $product_user_ids);
        })
        ->get();

    return response()->json($data);
    }

    public function UserGlobalFilter($old_location, $old_keyword){
        $location = str_replace('-', ' ', $old_location);
        $keyword = str_replace('-', ' ', $old_keyword);
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('name', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('name', 'like', '%' . $location . '%')->value('id');
        $userIds = User::where('state', $exist_state)
            ->orWhere('city', $exist_city)->whereNotNull('business_name')->whereNotNull('slug_business_name')
            ->pluck('id')
            ->toArray();

        $category = Collection::where('title', $keyword)
            ->pluck('id')
            ->toArray();

        $User_products = Product::whereIn('user_id', $userIds)
            ->where('title', 'like', '%' . $keyword . '%')
            ->pluck('user_id')
            ->toArray();
        $User_products = array_merge($User_products, Product::whereIn('user_id', $userIds)
            ->whereIn('category_id', $category)
            ->pluck('user_id')
            ->toArray());
            $authUserId = Auth::guard('web')->check() ? Auth::guard('web')->user()->id : null;
            $data = User::with('MyBadgeData')->whereIn('id', $User_products)
            ->where('id', '!=', $authUserId)
            ->get();
            $groupWatchList = GroupWatchList::where('created_by',$authUserId)->get();
            $product_categories = [];
            if(count($data)>0){
                foreach($data as $item){
                    if($item->UserProductData){
                        foreach($item->UserProductData as $Ditem){
                            $product_categories[] = $Ditem->category_id;
                        }
                      
                    }
                }
            }
            $categories = [];
            if(count($product_categories)>0){
                $categories = Collection::whereIn('id', $product_categories)->pluck('title')
                ->toArray();
            }
            $existing_inquiries= $this->BuyerDashboardRepository->get_all_existing_inquiries_by_user($authUserId);
            return view('front.filter', compact('data', 'location', 'keyword', 'old_location', 'old_keyword', 'categories','groupWatchList', 'existing_inquiries'));
    }
    public function UserGlobalFilterAddParticipant($old_location, $old_keyword){
        $location = str_replace('-', ' ', $old_location);
        $keyword = str_replace('-', ' ', $old_keyword);
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('name', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('name', 'like', '%' . $location . '%')->value('id');
        $userIds = User::where('state', $exist_state)
            ->orWhere('city', $exist_city)
            ->pluck('id')
            ->toArray();

        $category = Collection::where('title', $keyword)
            ->pluck('id')
            ->toArray();

        $User_products = Product::whereIn('user_id', $userIds)
            ->where('title', 'like', '%' . $keyword . '%')
            ->pluck('user_id')
            ->toArray();
        $User_products = array_merge($User_products, Product::whereIn('user_id', $userIds)
            ->whereIn('category_id', $category)
            ->pluck('user_id')
            ->toArray());
            $authUserId = Auth::guard('web')->check() ? Auth::guard('web')->user()->id : null;
            $data = User::with('MyBadgeData')->whereIn('id', $User_products)
            ->where('id', '!=', $authUserId)
            ->get();
            $groupWatchList = GroupWatchList::where('created_by',$authUserId)->get();
            $product_categories = [];
            if(count($data)>0){
                foreach($data as $item){
                    if($item->UserProductData){
                        foreach($item->UserProductData as $Ditem){
                            $product_categories[] = $Ditem->category_id;
                        }
                      
                    }
                }
            }
            $categories = [];
            if(count($product_categories)>0){
                $categories = Collection::whereIn('id', $product_categories)->pluck('title')
                ->toArray();
            }
            $existing_inquiries= $this->BuyerDashboardRepository->get_all_existing_inquiries_by_user($authUserId);
            return view('front.filter', compact('data', 'location', 'keyword', 'old_location', 'old_keyword', 'categories','groupWatchList', 'existing_inquiries'));
    }

    public function UserProfileFetch($location, $slug_keyword){
        // $location = str_replace('-', ' ', $location);
        // $keyword = str_replace('-', ' ', $keyword);
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('slug', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('slug', 'like', '%' . $location . '%')->value('id');
        $data = User::where(function($query) use ($location, $exist_state, $exist_city) {
            $query->where('state', $exist_state)
                  ->orWhere('city', $exist_city);
        })
        ->where('slug_business_name', $slug_keyword)
        ->first();

        if($data){
            return view('front.user.profile', compact('data', 'location', 'slug_keyword'));
        }else{
            return redirect()->back();
        }
    }   
    public function UserReviewAndRating($old_location, $old_keyword){
        // $location = str_replace('-', ' ', $old_location);
        // $keyword = str_replace('-', ' ', $old_keyword);
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('slug', 'like', '%' . $old_location . '%')->value('id');
        $exist_city = City::where('slug', 'like', '%' . $old_location . '%')->value('id');
        $data = User::where(function($query) use ($exist_state, $exist_city) {
            $query->where('state', $exist_state)
                  ->orWhere('city', $exist_city);
        })
        ->where('slug_business_name', $old_keyword)
        ->first();
        if($data){
            $review_rating = $this->userRepository->getUserAllReviewRating($data->id);
            $asBuyer = $this->userRepository->asBuyer($data->id);
            $on_time_payment_rating = $this->userRepository->on_time_payment_rating($data->id);
            $delivery_cooperation_rating = $this->userRepository->delivery_cooperation_rating($data->id);
            $genuiness_rating = $this->userRepository->genuiness_rating($data->id);
            $asBuyerOverallRatingPoint = $this->userRepository->asBuyerOverallRatingPoint($data->id);
            $asSeller = $this->userRepository->asSeller($data->id);
            $on_time_delivery_rating = $this->userRepository->on_time_delivery_rating($data->id);
            $right_product_rating = $this->userRepository->right_product_rating($data->id);
            $post_delivery_service_rating = $this->userRepository->post_delivery_service_rating($data->id);
            $asSellerOverallRatingPoint = $this->userRepository->asSellerOverallRatingPoint($data->id);
            return view('front.user.rating', compact('old_location','old_keyword','data', 'review_rating','asBuyer','on_time_payment_rating','delivery_cooperation_rating','genuiness_rating', 'asSeller','on_time_delivery_rating','right_product_rating','post_delivery_service_rating','asBuyerOverallRatingPoint','asSellerOverallRatingPoint'));
        }else{
            return redirect()->back();
        }
    }   
    public function UserReviewAndRatingWrite($location, $slug_keyword){
        // $location = str_replace('-', ' ', $location);
        // $keyword = str_replace('-', ' ', $keyword);
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('slug', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('slug', 'like', '%' . $location . '%')->value('id');
        $data = User::where(function($query) use ($location, $exist_state, $exist_city) {
            $query->where('state', $exist_state)
                  ->orWhere('city', $exist_city);
        })
        ->where('slug_business_name', $slug_keyword)
        ->first();
        return view('front.user.review_rating_form',compact('data'));
    }   
    public function UserReviewAndRatingWriteSubmit(Request $request){
    //    dd($request->all());
       $authUserId = Auth::guard('web')->check() ? Auth::guard('web')->user()->id : null;
       if($request->rateas==1){
        $rating = new ReviewRating();
        $rating->user_id =$authUserId;
        $rating->type = 1;  //ratting as a supplier, rated on buyer
        $rating->rated_on =$request->rated_on_id;
        $rating->on_time_payment_rating =$request->on_time_payment;
        $rating->delivery_cooperation_rating =$request->post_delivery_cooperation;
        $rating->genuiness_rating =$request->genuiness;
        $rating->overall_rating = number_format((($request->on_time_payment + $request->post_delivery_cooperation + $request->genuiness) / 3), 2);
        $rating->comment =$request->supplier_message;
        $rating->save();
       }else{
        $rating = new ReviewRating();
        $rating->user_id =$authUserId;
        $rating->type = 2;  //rating as a buyer , rated on supplier
        $rating->rated_on =$request->rated_on_id;
        $rating->on_time_delivery_rating =$request->on_time_delivery;
        $rating->right_product_rating =$request->right_product;
        $rating->post_delivery_service_rating =$request->post_delivery_service;
        $rating->overall_rating = number_format((($request->on_time_delivery + $request->right_product + $request->post_delivery_service) / 3), 2);
        $rating->comment =$request->buyer_message;
        $rating->save();  
       }
        //worn on sweet alert after review done
      return redirect()->back()->with('success','Your rating and review submitted successfully');
    }
    

  
    public function UserPhotoAndDocument($location, $keyword){
        // $location = str_replace('-', ' ', $location);
        // $keyword = str_replace('-', ' ', $keyword);
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('slug', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('slug', 'like', '%' . $location . '%')->value('id');
        $data = User::where(function($query) use ($location, $exist_state, $exist_city) {
            $query->where('state', $exist_state)
                  ->orWhere('city', $exist_city);
        })
        ->where('slug_business_name', $keyword)
        ->first();
        if($data){
            $AllImages = $this->userRepository->getUserAllImages($data->id);
            $user_document = $this->userRepository->getUserAllData($data->id);
            return view('front.user.photos_and_documents', compact('data', 'AllImages', 'user_document'));
        }else{
            return redirect()->back();
        }
    }   
    public function UserProductService($location, $keyword){
        // $location = str_replace('-', ' ', $location);
        // $keyword = str_replace('-', ' ', $keyword);
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('slug', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('slug', 'like', '%' . $location . '%')->value('id');
        $data = User::where(function($query) use ($location, $exist_state, $exist_city) {
            $query->where('state', $exist_state)
                  ->orWhere('city', $exist_city);
        })
        ->where('slug_business_name', $keyword)
        ->first();
        if($data){
            $Product = Product::where('user_id', $data->id)->get();
            return view('front.user.product_and_service', compact('Product', 'data'));
        }else{
            return redirect()->back();
        }
    }   
    public function RequirementsAndConsumption($location, $keyword){
        $exist_state = "";
        $exist_city = "";
        $exist_state = State::where('slug', 'like', '%' . $location . '%')->value('id');
        $exist_city = City::where('slug', 'like', '%' . $location . '%')->value('id');
        $data = User::where(function($query) use ($location, $exist_state, $exist_city) {
            $query->where('state', $exist_state)
            ->orWhere('city', $exist_city);
        })
        ->where('slug_business_name', $keyword)
        ->first();
        if($data){
            $consumption = RequirementConsumption::where('user_id', $data->id)->get();
            return view('front.user.requirement_consumption', compact('consumption', 'data'));
        }else{
            return redirect()->back();
        }
    }   
    public function TermsConditions(){
        return view('front.user.terms_conditions');
    }
    public function PrivacyPolicy(){
        return view('front.user.privacy_policy');

    }
    
    public function CoziTest(Request $request){
        try {
            // Retrieve the JSON data from the request body
            $requestData = $request->all();
            // Check if the 'messages' array exists in the decoded data
            $statuses = $requestData['statuses'] ?? [];
            $messages = $requestData['messages'] ?? [];
            $contacts = $requestData['contacts'] ?? [];
            $country_code = null;
            $recipient_number = null;
            $type = null;
            $text = null;
            $qr_code = null;
            $status = null;
            if (isset($messages)) {
                // Access the first message in the array
                $firstMessage = $requestData['messages'][0] ?? null;

                // Check if the first message exists and has the 'type' and 'text' fields
                if ($firstMessage && isset($firstMessage['type'], $firstMessage['text']['body'])) {
                    $text = $firstMessage['text']['body'];
                    // Retrieve the 'type' and 'body' values from the first message
                    $startPosition = strpos($text, 'Your QR Code is');
                    $substringAfterQRCode = substr($text, $startPosition + strlen('Your QR Code is'));

                    // Trim any leading or trailing spaces
                    $substringAfterQRCode = trim($substringAfterQRCode);
                    $substringAfterQRCode = str_replace('.', '', $substringAfterQRCode);
                    $from = $firstMessage['from'];
                    $qr_code = $substringAfterQRCode?$substringAfterQRCode:null;
                    $type = $firstMessage['type'];
                    
                    
                    $country_code = substr($from, 0, 2);
                    $recipient_number = substr($from, 2, 11);
                    $recipient_number =$recipient_number;
                    // Now you have the 'type' and 'body' values from the first message
                    // You can use them as needed in your code
                }
            }else{
                $country_code = substr($statuses[0]['recipient_id'], 0, 2);
                $recipient_number = substr($statuses[0]['recipient_id'], 2, 11);
                $status = $statuses[0]['status'];
                $type = $statuses[0]['type'];
                $recipient_number =$recipient_number;
                $text = null;
                $qr_code = null;
            }
            
            // $brand_msisdn = $requestData['brand_msisdn'] ?? '';
            // $request_id = $requestData['request_id'] ?? '';
           
            // dd($recipient_number);
           
            // Perform operations based on the retrieved data
            if($requestData){
                $coziWhatsapp = new CoziWhatsapp();
                $coziWhatsapp->country_code = $country_code;
                $coziWhatsapp->mobile = $recipient_number;
                $coziWhatsapp->status = $status;
                $coziWhatsapp->type = $type;
                $coziWhatsapp->qr_code = $qr_code;
                $coziWhatsapp->text = $text;
                $coziWhatsapp->response = json_encode($requestData);
                // $coziWhatsapp->response = json_encode($requestData);
                $coziWhatsapp->save();
            }
            // if (strpos($text, 'Your QR Code is') !== false) {
            //     $response_data = $this->SendWhatsAppMessage($qr_code, $recipient_number);
                // dd($response_data);
                // $coziWhatsapp = new CoziWhatsapp();
                // $coziWhatsapp->response = $response_data;
                // $coziWhatsapp->save();
            // }
            // Return a response if needed
            return response()->json(['status' => 'success', 'data' => $requestData]);
        } catch (\Exception $e) {
            // Handle any exceptions
            $coziWhatsapp = new CoziWhatsapp();
            $coziWhatsapp->response = $e->getMessage();
            $coziWhatsapp->save();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    public function SendWhatsAppMessage($qr_code,$mobile){
    //    $mobile = "7908115612";
    $GetUser = CoziWhatsapp::where('mobile', $mobile)->where('qr_code', $qr_code)->first();
        try {
            //  Authenticate and obtain token
            $authResponse = Http::post('https://apis.rmlconnect.net/auth/v1/login/', [
                "username" => "LuxIndustriesNew",
                "password" => "Welcome@1"
            ])->json();
            // Extract token from the response
            $token = $authResponse['JWTAUTH'];
            // $coziWhatsapp = new CoziWhatsapp();
            // $coziWhatsapp->response = $token;
            // $coziWhatsapp->save();
            // Build the request body
            $data = [
                "phone" => '+91' . $mobile,
                "enable_acculync" => true,
                "media" => [
                    "type" => "media_template",
                    "template_name" => "playwin",
                    "lang_code" => "en",
                    "body" => [
                        [
                            "text" => "Hello", // Replace with your variable value
                        ],
                        [
                            "text" => "Dear", // Replace with your variable value
                        ]
                    ],
                    "button" => [
                        [
                            "button_no" => "0",
                            "url" => "index.html?qrcode=" . $qr_code . "_91" . $mobile
                        ]
                    ]
                ]
            ];
                // dd($data);
            // Make the HTTP request to send message
            $jsonData = json_encode($data);

            // Initialize cURL session
            $ch = curl_init();
        
            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, 'https://apis.rmlconnect.net/wba/v1/messages');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: ' . $token
            ]);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        
            // Execute cURL request
            $response = curl_exec($ch);
            // Check for errors
            if (curl_errno($ch)) {
                $error_msg = curl_error($ch);
                curl_close($ch);
                throw new Exception('Curl error: ' . $error_msg);
            }

            // Get HTTP response status code
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            // Close cURL session
            curl_close($ch);

            // Decode the response
            // dd($response);
            $responseBody = json_decode($response, true);
            // dd($responseBody);
            if($GetUser){
                $GetUser->message = $responseBody;
                $GetUser->save();
            }

        } catch (\Exception $e) {
            // Handle any exceptions
            $coziWhatsapp = new CoziWhatsapp();
            $coziWhatsapp->response = $e->getMessage();
            $coziWhatsapp->save();
            return $e->getMessage();
        }
    }
    public function CoziUserData(){
        return CoziWhatsapp::latest()->get();
    }
}