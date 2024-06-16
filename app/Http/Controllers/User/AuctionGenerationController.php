<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\MasterContract;
use App\Models\WatchList;
use App\Models\User;
use App\Models\City;
use App\Models\State;
use App\Models\Inquiry;
use App\Models\MyBuyerWallet;
use App\Models\Collection;
use App\Models\Category;
use App\Models\InquiryParticipant;
use App\Models\OutsideParticipant;
use App\Models\InquiryOutsideParticipant;
use App\Models\GroupWatchList;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use DB;



class AuctionGenerationController extends Controller
{
    protected $userRepository;
    protected $MasterRepository;

    public function __construct(UserContract $userRepository, MasterContract $MasterRepository) {
        $this->userRepository = $userRepository;
        $this->MasterRepository = $MasterRepository;
    }
    private function AuthCheck(){
        if(Auth::guard('web')->check()){
            return Auth::guard('web')->user();
        } else{
           return "";
        }
    }

    public function auction_inquiry_generation(Request $request){
        $user = $this->AuthCheck();
        $buyer_active_credit = $this->MasterRepository->getBuyerActiveCredit($user->id);
        $all_category = $this->MasterRepository->getAllActiveCollections();
        $inquiry_id = "";
        $group_id = "";
        $watch_list_data = [];
        $existing_inquiry = [];
        $exsisting_outside_participant = [];
        if($request->inquiry_type=="existing-inquiry"){
            $inquiry_id = $request->inquiry_id;
            $existing_inquiry = Inquiry::with('ParticipantsData')->where('inquiry_id', $inquiry_id)->first();
        }
        if($request->group && $request->inquiry_type){
            try {
                $group_id = Crypt::decrypt($request->group);
                $watch_list_data = WatchList::with('SellerData')->where('group_id', $group_id)->get();
                $outside_participant_data = OutsideParticipant::where('group_id', $group_id)->where('buyer_id', $user->id)->get();
                // return view('front.user.auction-inquiry-generation', compact('group_id','existing_inquiry', 'user','watch_list_data', 'inquiry_id', 'all_category', 'outside_participant_data', 'outside_participant_without_group'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }elseif($request->inquiry_type=="saved-inquiry"){
            try{
                $inquiry_id = Crypt::decrypt($request->inquiry_id);
                $existing_inquiry = Inquiry::with('ParticipantsData')->where('id', $inquiry_id)->first();
                $exsisting_outside_participant = InquiryOutsideParticipant::where('inquiry_id', $existing_inquiry->id)->get();
                $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->get();
                $outside_participant_without_group = [];
                $outside_participant_data = [];
                // return view('front.user.auction-inquiry-generation', compact('group_id','user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry', 'outside_participant_data', 'outside_participant_without_group'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }elseif($request->seller && $request->inquiry_type){
            try{
                $id = Crypt::decrypt($request->seller);
                $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->where('seller_id', $id)->get();
                $outside_participant_data = [];
                $outside_participant_without_group = [];
                // return view('front.user.auction-inquiry-generation', compact('group_id','user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry', 'outside_participant_data', 'outside_participant_without_group'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }else{
            $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->get();
            $outside_participant_data = [];
            $outside_participant_without_group = [];
        }

        $outside_participant_without_group = OutsideParticipant::where('group_id', null)->where('buyer_id', $user->id)->get();
        $States = State::orderBy('name')->select('name')->get();
        return view('front.user.auction-inquiry-generation', compact('group_id', 'user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry', 'outside_participant_data', 'outside_participant_without_group','exsisting_outside_participant', 'States', 'buyer_active_credit'));
    }

    public function auction_inquiry_generation_store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'category' => 'required',
            'sub_category' => 'required',
            'auction_type' => 'required',
            'execution_date' => 'required|date|after:end_date',
            'quotes_per_participants' => 'required|numeric',
            'minimum_quote_amount' => 'nullable|numeric',
            'maximum_quote_amount' => 'nullable|numeric|gt:minimum_quote_amount',
            'bid_difference_quote_amount' => 'required|numeric|gt:0',
        ], [
            'supplier_location.required_if' => 'Please select any one location',
        ]);
    
        // Add conditional validation for 'supplier_location'
        $validator->sometimes('supplier_location', 'required', function ($input) {
            return $input->auction_type === 'open auction';
        });
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $inquiry_id = $request->saved_inquiry_id?$request->saved_inquiry_id:"";
            $inquiry = Inquiry::where('id', $inquiry_id)->first();
            if(empty($inquiry)){
                $inquiry = new Inquiry;
                if($request->submit_type == "generate"){
                    $order_no = genAutoIncreNoYearWiseInquiry(8,'inquiries',date('Y'),date('m'));
                    $inquiry->inquiry_id = $order_no;
                }
            }else{
                if($request->submit_type == "generate" && $inquiry->inquiry_id==null){
                    $order_no = genAutoIncreNoYearWiseInquiry(8,'inquiries',date('Y'),date('m'));
                    $inquiry->inquiry_id = $order_no;
                }
            }
             
            $inquiry->created_by = $request->created_by;
            $inquiry->title = ucwords($request->title);
            $inquiry->slug = slugGenerate($request->title, 'inquiries');
            $inquiry->start_date = $request->start_date;
            $inquiry->start_time = $request->start_time;
            $inquiry->end_date = $request->end_date;
           
            $inquiry->end_time = $request->end_time;
            $inquiry->category = $request->category;
            $inquiry->sub_category = $request->sub_category;
            $inquiry->description = $request->description;
            $inquiry->execution_date = $request->execution_date;
            $inquiry->quotes_per_participants = $request->quotes_per_participants;
            $inquiry->minimum_quote_amount = $request->minimum_quote_amount;     
            $inquiry->maximum_quote_amount = $request->maximum_quote_amount;
            $inquiry->bid_difference_quote_amount = $request->bid_difference_quote_amount;
            $inquiry->inquiry_type = $request->auction_type?$request->auction_type:$inquiry->inquiry_type;
            

            if($request->supplier_location == "region"){
                $inquiry->location = $request->region; 
            } elseif($request->supplier_location == "country") {
                $inquiry->location = "India"; 
            } elseif($request->supplier_location == "city") {
                $City = City::where('id', $request->city)->first();
                $inquiry->location = $City?$City->name:""; 
            }
            if($inquiry->inquiry_type=="close auction"){
                $user = User::findOrFail($request->created_by)->with('CityData')->first();
                $inquiry->location = $user->city?$user->CityData->name:"";
            }
            $inquiry->location_type =$request->supplier_location;
            $inquiry->save();
            if($inquiry && isset($request->participant) && count($request->participant) > 0){
                foreach($request->participant as $key => $item){
                    $exist_participants = InquiryParticipant::where('inquiry_id', $inquiry->id)->where('user_id', $item)->get();
                    if(count($exist_participants)==0){
                        $participant = new InquiryParticipant;
                        $participant->inquiry_id = $inquiry->id;
                        $participant->user_id = $item;
                        $participant->selected_from = 1;//1 for Close Inquiry & 0 for OPen Inquiry
                        $participant->save();
                    }else{
                        $exist_participants->selected_from = 1;//1 for Close Inquiry & 0 for OPen Inquiry
                        $exist_participants->save(); 
                    }
                }
            }
            
            if($inquiry && isset($request->outside_participant) && count($request->outside_participant) > 0){
                foreach($request->outside_participant as $key => $item){
                    $outside_participant_data = OutsideParticipant::where('id', $item)->first();
                    if($outside_participant_data ){
                        $Exist_outside_participant = InquiryOutsideParticipant::where('inquiry_id', $inquiry->id)->where('mobile', $outside_participant_data->mobile)->first();
                        if(!isset($Exist_outside_participant)){
                            $inqOutParti =  new InquiryOutsideParticipant;
                            $inqOutParti->inquiry_id = $inquiry->id;
                            $inqOutParti->buyer_id = $outside_participant_data->buyer_id;
                            $inqOutParti->name = $outside_participant_data->name;
                            $inqOutParti->mobile = $outside_participant_data->mobile;
                            $inqOutParti->selected_from = $request->auction_type=="close auction"?1:0;//1 for Close Inquiry & 0 for OPen Inquiry
                            $inqOutParti->save();
                            if($inqOutParti){
                                $outside_participant_data->delete();
                            }
                        }else{
                            $Exist_outside_participant->selected_from = $request->auction_type=="close auction"?1:0;//1 for Close Inquiry & 0 for OPen Inquiry
                            $Exist_outside_participant->save(); 
                            if($Exist_outside_participant){
                                $outside_participant_data->delete();
                            }
                        }
                    }
                }
            }

            $my_category = $request->category;
            $my_sub_category = $request->sub_category;

            // Fetch the category and sub-category IDs
            $category = Collection::where('title', $my_category)->first();
            $category_id = $category ? $category->id : null;

            $sub_category = Category::where('title', $my_sub_category)->first();
            $sub_category_id = $sub_category ? $sub_category->id : null;

            if ($request->auction_type === "open auction") {
                // dd($request->all());
                $my_city = $request->supplier_location=="city"?$request->city:null;
                $my_state_name = $request->supplier_location=="region"?$request->region:null;
                $States = State::where('name', $my_state_name)->first();
                $my_state = $States?$States->id:null;
                // Build the query
                if($request->supplier_location=="country"){
                    $open_sellers = get_open_sellers_by_country($request->created_by,$category_id,$sub_category_id);
                }else{
                    $open_sellers = get_open_sellers($my_city,$my_state,$request->created_by,$category_id,$sub_category_id);
                }
                if(count($open_sellers)>0){
                    foreach($open_sellers as $k =>$items){
                        $exist_participants = InquiryParticipant::where('inquiry_id', $inquiry->id)->where('user_id', $items)->get();
                        if(count($exist_participants)==0){
                            $participant = new InquiryParticipant;
                            $participant->inquiry_id = $inquiry->id;
                            $participant->user_id = $items;
                            $participant->selected_from = 0;//1 for Close Inquiry & 0 for OPen Inquiry
                            $participant->save();
                        }
                    }
                }
            }
            if($request->submit_type == "generate"){
                $exist_total_participants = InquiryParticipant::where('inquiry_id', $inquiry->id)->count();
                $buyer_active_credit = $this->MasterRepository->getBuyerActiveCredit($request->created_by);
                $link = route('user.buyer_wallet_transaction');
                    if($request->auction_type === "open auction" && $exist_total_participants>0){
                        $sets_of_25 = ceil($exist_total_participants / 25);
                        // Calculate the credit based on the number of sets
                        $credit = 1 * $sets_of_25; // Adjust with your logic
                        if($buyer_active_credit<$credit){
                            DB::rollBack();
                            return redirect()->back()->with('warning', 'You don\'t have sufficient credit in your wallet');
                        }
                        $MyBuyerWallet =new MyBuyerWallet;
                        $MyBuyerWallet->user_id = $request->created_by;
                        $MyBuyerWallet->type = 0;//Debit
                        $MyBuyerWallet->inquiry_id =$inquiry->inquiry_id;//Debit
                        $MyBuyerWallet->purpose = "For generate an inquiry";//reason
                        $MyBuyerWallet->debit_unit = $credit;//for per inquiry
                        $MyBuyerWallet->current_unit = $buyer_active_credit-$credit;
                        $MyBuyerWallet->save();
                        notification_push(NULL,$request->created_by,$request->created_by,$credit." credit used for a new inquiry generation",NULL,$link);
                    }
                    if($request->auction_type === "close auction" && $exist_total_participants>0){
                        $sets_of_25 = ceil($exist_total_participants / 25);
                        // Calculate the credit based on the number of sets
                        $credit = 1 * $sets_of_25;

                        if($buyer_active_credit<$credit){
                            DB::rollBack();
                            return redirect()->back()->with('warning', 'You don\'t have sufficient credit in your wallet');
                        }
                        $MyBuyerWallet =new MyBuyerWallet;
                        $MyBuyerWallet->user_id = $request->created_by;
                        $MyBuyerWallet->type = 0;//Debit
                        $MyBuyerWallet->inquiry_id =$inquiry->inquiry_id;//Debit
                        $MyBuyerWallet->purpose = "For generate an inquiry";//reason
                        $MyBuyerWallet->debit_unit = $credit;//for per inquiry
                        $MyBuyerWallet->current_unit = $buyer_active_credit-$credit;
                        $MyBuyerWallet->save();
                        notification_push(NULL,$request->created_by,$request->created_by,$credit." credit used for a new inquiry generation",NULL,$link);
                    }
               
                DB::commit();
                return redirect()->route('user_buyer_dashboard')->with('success', 'Inquiry has been generated successfully.');
            }else{
                DB::commit();
                return redirect()->route('user_buyer_dashboard')->with('success', 'Inquiry data has been saved successfully.');
            }
        } catch (\Exception $e) {
            // DB::rollBack();
            dd($e->getMessage());
             return abort(404);
         }
    }

    public function auction_participants_delete(Request $request){
        InquiryParticipant::destroy($request->id);
        return response()->json(['status'=>200]);  
    }
    public function auction_inquiry_restart(Request $request){
        // dd($request->all());
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'execution_date' => 'required|date|after:end_date',                       
           ]);
        $inquiry = Inquiry::findOrFail($request->auction_id);

            $inquiry->start_date = $request->start_date;
            $inquiry->end_date = $request->end_date;
            $inquiry->start_time = $request->start_time;
            $inquiry->end_time = $request->end_time;
            $inquiry->execution_date = $request->execution_date;
            $inquiry->status = 1;
            $inquiry->save();
            return redirect()->route('user_buyer_dashboard')->with('success', 'Inquiry has been restart successfully.');

        // InquiryParticipant::destroy($request->id);
        // return response()->json(['status'=>200]);  
    }
    
    
}