<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\SellerDashboardContract;
use App\Contracts\MasterContract;
use App\Models\InquirySellerQuotes;
use App\Models\InquiryParticipant;
use App\Models\InquirySellerComments;
use App\Models\Inquiry;
use App\Models\MySellerWallet;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;

class SellerDashboardController extends Controller
{
    protected $userRepository;
    protected $MasterRepository;
    protected $SellerDashboardRepository;


    public function __construct(UserContract $userRepository, MasterContract $MasterRepository, SellerDashboardContract $SellerDashboardRepository) {
        $this->userRepository = $userRepository;
        $this->MasterRepository = $MasterRepository;
        $this->SellerDashboardRepository = $SellerDashboardRepository;

    }

    private function getAuthenticatedUserId() {
        if (Auth::guard('web')->check()) {
            return Auth::guard('web')->user()->id;
        }
        return null;
    }

    public function index(Request $request){
        $group_wise_list =  $this->SellerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $all_inquery =  $this->SellerDashboardRepository->all_participants_inquiries_of_seller($this->getAuthenticatedUserId());
        $live_inquiries_count =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        $pending_inquiries_count =  $this->SellerDashboardRepository->pending_inquiries_by_seller();
        $confirmed_inquiries_count =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller(); 
        $rejected_inquiries =  $this->SellerDashboardRepository->rejected_inquiries_by_seller($this->getAuthenticatedUserId());
        $all_inquery_count = 0;
        foreach ( $all_inquery as  $item){
            if(empty(get_inquiry_seller_quotes($item->my_id, $item->id))){
                $all_inquery_count+=1;
            }
        }
        $rejected_inquiries_count = 0;
        foreach ($rejected_inquiries as  $item){
            if($item->my_id==$this->getAuthenticatedUserId()){
                $rejected_inquiries_count+=1;
            }
        }
        return view('front.seller_dashboard.index',compact('group_wise_list', 'all_inquery_count', 'live_inquiries_count', 'pending_inquiries_count', 'confirmed_inquiries_count', 'rejected_inquiries_count'));
    }
    public function all_inquiries(Request $request){
        $seller_cancell_reasons = $this->MasterRepository->getAllSellerReason();
        $seller_active_credit = $this->MasterRepository->getSellerActiveCredit($this->getAuthenticatedUserId());
        $group_wise_list_count =  $this->SellerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $all_inquery =  $this->SellerDashboardRepository->all_participants_inquiries_of_seller($this->getAuthenticatedUserId());
        $live_inquiries_count =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        $pending_inquiries_count =  $this->SellerDashboardRepository->pending_inquiries_by_seller();
        $confirmed_inquiries_count =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller(); 
        $rejected_inquiries =  $this->SellerDashboardRepository->rejected_inquiries_by_seller($this->getAuthenticatedUserId());
        $all_inquery_count = 0;
        foreach ( $all_inquery as  $item){
            if(empty(get_inquiry_seller_quotes($item->my_id, $item->id))){
                $all_inquery_count+=1;
            }
        }
        $rejected_inquiries_count = 0;
        foreach ($rejected_inquiries as  $item){
            if($item->my_id==$this->getAuthenticatedUserId()){
                $rejected_inquiries_count+=1;
            }
        }
        return view('front.seller_dashboard.all_inquireis',compact('seller_active_credit','all_inquery', 'all_inquery_count', 'group_wise_list_count', 'live_inquiries_count', 'pending_inquiries_count', 'confirmed_inquiries_count', 'rejected_inquiries_count','seller_cancell_reasons'));
    }
    public function live_inquiries(Request $request){
        $group_wise_list_count =  $this->SellerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $all_inquery =  $this->SellerDashboardRepository->all_participants_inquiries_of_seller($this->getAuthenticatedUserId());
        $live_inquiries_count =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        $pending_inquiries_count =  $this->SellerDashboardRepository->pending_inquiries_by_seller();
        $confirmed_inquiries_count =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller(); 
        $rejected_inquiries =  $this->SellerDashboardRepository->rejected_inquiries_by_seller($this->getAuthenticatedUserId());
        $all_inquery_count = 0;
        foreach ( $all_inquery as  $item){
            if(empty(get_inquiry_seller_quotes($item->my_id, $item->id))){
                $all_inquery_count+=1;
            }
        }
        $rejected_inquiries_count = 0;
        foreach ($rejected_inquiries as  $item){
            if($item->my_id==$this->getAuthenticatedUserId()){
                $rejected_inquiries_count+=1;
            }
        }
       return view('front.seller_dashboard.live_inquireis',compact('all_inquery_count', 'group_wise_list_count', 'live_inquiries_count', 'pending_inquiries_count', 'confirmed_inquiries_count', 'rejected_inquiries_count'));
    }
    public function live_inquiries_fetch_ajax(){
        $live_inquiries =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        $inquiries = [];
        if(count($live_inquiries)>0){
            foreach ($live_inquiries as $key => $value) {
                if(!empty(get_inquiry_seller_quotes($value->my_id, $value->id))){
                    $startDateTime = Carbon::parse($value->start_date . ' ' . $value->start_time)->timezone(env('APP_TIMEZONE'));
                    // Calculate remaining time until end date/time
                    $endDateTime = Carbon::parse($value->end_date . ' ' . $value->end_time)->timezone(env('APP_TIMEZONE'));
                    $currentDateTime = Carbon::now();
                    $adjustedEndDateTime = $endDateTime->copy()->addMinutes(1);
                    if ($currentDateTime < $adjustedEndDateTime) {
                        // Calculate remaining time until start date/time
                        $all_inquiries = [];
                        $all_inquiries['id'] = $value->id;
                        $all_inquiries['inquiry_id'] = $value->inquiry_id;
                        $all_inquiries['buyer_name'] = ucwords($value->buyer_name);
                        $all_inquiries['buyer_business_name'] = ucwords($value->buyer_business_name);
                        $all_inquiries['country_code'] = $value->country_code;
                        $all_inquiries['buyer_mobile'] = $value->buyer_mobile;
                        $all_inquiries['allot_seller'] = $value->allot_seller;
                        $all_inquiries['inquiry_amount'] = $value->inquiry_amount;
                        $all_inquiries['title'] = ucwords($value->title);
                        $all_inquiries['start_date_time'] = date('d M, Y h:i A', strtotime($value->start_date.' '.$value->start_time));
                        if ($currentDateTime < $startDateTime) {
                            $startRemainingTime = $startDateTime->diff($currentDateTime);
                            $days = $startRemainingTime->days;
                            $hours = $startRemainingTime->h;
                            $minutes = $startRemainingTime->i;
                            $seconds = $startRemainingTime->s;
                            $all_inquiries['live_status'] = 0;
                            $all_inquiries['start_remaining_time'] = "Starts in: $days d $hours h $minutes m $seconds s";
                        } else {
                            $all_inquiries['start_remaining_time'] = null;
                            $all_inquiries['live_status'] = 1;
                        }

                        if ($currentDateTime < $endDateTime) {
                            $endRemainingTime = $endDateTime->diff($currentDateTime);
                            $days = $endRemainingTime->days;
                            $hours = $endRemainingTime->h;
                            $minutes = $endRemainingTime->i;
                            $seconds = $endRemainingTime->s;
                            $all_inquiries['end_date_time'] = date('d M, Y h:i A', strtotime($value->end_date.' '.$value->end_time));
                            $all_inquiries['end_remaining_time'] = "Ends in: $days d $hours h $minutes m $seconds s";
                        } else {
                            $all_inquiries['end_date_time'] = date('d M, Y h:i A', strtotime($value->end_date.' '.$value->end_time));
                            $all_inquiries['end_remaining_time'] = 0;
                            // sleep(60); // Wait for 60 seconds
                            // $store = Inquiry::find($value->id);
                            // $store->status = 2;
                            // $store->save();
                        }
                        $all_inquiries['category'] = $value->category;
                        $all_inquiries['sub_category'] = $value->sub_category;
                        $all_inquiries['description'] = $value->description;
                        $all_inquiries['execution_date'] = date('d M, Y h:i A', strtotime($value->execution_date));
                        $all_inquiries['quotes_per_participants'] = $value->quotes_per_participants;
                        $all_inquiries['minimum_quote_amount'] = $value->minimum_quote_amount?number_format($value->minimum_quote_amount,2, '.', ','):"----";
                        $all_inquiries['maximum_quote_amount'] = $value->maximum_quote_amount?number_format($value->maximum_quote_amount,2, '.', ','):"----";
                        $all_inquiries['minimum_quote'] = $value->minimum_quote_amount;
                        $all_inquiries['maximum_quote'] = $value->maximum_quote_amount;
                        $all_inquiries['inquiry_type'] = $value->inquiry_type;
                        $all_inquiries['inquiry_amount'] = $value->inquiry_amount;
                        $all_inquiries['location'] = $value->location;
                        $all_inquiries['status'] = $value->status;
                        $all_inquiries['my_id'] = $value->my_id;
                        $all_inquiries['my_quote_status'] = $value->my_quote_status;
                        $all_inquiries['my_name'] = Auth::guard('web')->check() ? ucwords(Auth::guard('web')->user()->name) : "";
                        $all_inquiries['my_business_name'] = Auth::guard('web')->check() ? ucwords(Auth::guard('web')->user()->business_name) : "";
                        $all_inquiries['my_last_three_quotes'] = [];
                        $getAllSellerQuotes = getAllSellerQuotes($value->id);
                        $my_mank = null;
                        if(count($getAllSellerQuotes)>0){
                            foreach($getAllSellerQuotes as $k =>$items){
                                if($items->seller_id ==$value->my_id){
                                    $my_mank = $k+1;
                                }
                            }
                        }
                        $all_inquiries['my_mank'] = $my_mank;
                    

                        $all_inquiries['my_last_quotes'] = '';
                        foreach($last_three_quotes = get_last_three_quotes($value->id,$value->my_id) as $index =>$qItem){
                            $all_inquiries['my_last_three_quotes'][]=$qItem->quotes;
                            $all_inquiries['my_last_quotes'] = $last_three_quotes[0]->quotes;
                        }

                        $count = 0;
                        $quote_difference = 0; // Initialize the quote difference
                        // Iterate through the array
                        $array = $all_inquiries['my_last_three_quotes'];
                        
                        for ($i = 0; $i < count($array) - 1; $i++) {
                            $count++; 
                            if ($count >= 1) { // Check if the count is 2 or more
                                // Calculate the quote difference dynamically between the last index and the item before the last index
                                $quote_difference = abs($array[count($array) - 1] - $array[count($array) - 2]);
                                break; // Exit the loop once the condition is met
                            }
                        }
                        // Assuming $all_inquiries['my_last_three_quotes'] is an array
                        $all_inquiries['my_last_three_quotes'] = array_reverse($all_inquiries['my_last_three_quotes']);
                        $all_inquiries['quote_difference'] = $value->bid_difference_quote_amount;

                        $all_inquiries['left_quotes'] = $value->quotes_per_participants - get_my_all_quotes($value->id,$value->my_id);
                        $inquiries[] = $all_inquiries;
                    }
                }
            }
            
        }
        if(count($inquiries)>0){
            return response()->json(['status'=>200, 'data'=>$inquiries]);
        }else{
            return response()->json(['status'=>400]);
        }
    }
    public function pending_inquiries(Request $request){
        $pending_inquiries =  $this->SellerDashboardRepository->pending_inquiries_by_seller();
        $group_wise_list_count =  $this->SellerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $all_inquery =  $this->SellerDashboardRepository->all_participants_inquiries_of_seller($this->getAuthenticatedUserId());
        $live_inquiries_count =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        $pending_inquiries_count =  $this->SellerDashboardRepository->pending_inquiries_by_seller();
        $confirmed_inquiries_count =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller(); 
        $rejected_inquiries =  $this->SellerDashboardRepository->rejected_inquiries_by_seller($this->getAuthenticatedUserId());
        $all_inquery_count = 0;
        foreach ( $all_inquery as  $item){
            if(empty(get_inquiry_seller_quotes($item->my_id, $item->id))){
                $all_inquery_count+=1;
            }
        }
        $rejected_inquiries_count = 0;
        foreach ($rejected_inquiries as  $item){
            if($item->my_id==$this->getAuthenticatedUserId()){
                $rejected_inquiries_count+=1;
            }
        }
        $inquiries = [];
        if(count($pending_inquiries)>0){
            foreach ($pending_inquiries as $key => $value) {
               
                if(!empty(get_inquiry_seller_quotes($value->my_id, $value->id))){
                    $all_inquiries = [];
                    $all_inquiries['id'] = $value->id;
                    $all_inquiries['inquiry_id'] = $value->inquiry_id;
                    $all_inquiries['buyer_name'] = ucwords($value->buyer_name);
                    $all_inquiries['buyer_business_name'] = ucwords($value->buyer_business_name);
                    $all_inquiries['country_code'] = $value->country_code;
                    $all_inquiries['buyer_mobile'] = $value->buyer_mobile;
                    $all_inquiries['title'] = ucwords($value->title);
                    $all_inquiries['start_date_time'] = date('d M, Y h:i A', strtotime($value->start_date.' '.$value->start_time));
                    $startDateTime = Carbon::parse($value->start_date . ' ' . $value->start_time)->timezone(env('APP_TIMEZONE'));
                    $endDateTime = Carbon::now();
                    
                    if ($startDateTime > $endDateTime) {
                        $endRemainingTime = $endDateTime->diff($startDateTime);
                        $days = $endRemainingTime->days;
                        $hours = $endRemainingTime->h;
                        $minutes = $endRemainingTime->i;
                        $seconds = $endRemainingTime->s;
                        
                        $all_inquiries['start_remaining_time'] = "Start IN: $days d $hours h $minutes m $seconds s";
                    } else {
                        $all_inquiries['start_remaining_time'] =null;
                    }
                    $all_inquiries['end_date_time'] = date('d M, Y h:i A', strtotime($value->end_date.' '.$value->end_time));
                    $startDateTime = Carbon::now();
                    $endDateTime = Carbon::parse($value->end_date . ' ' . $value->end_time)->timezone(env('APP_TIMEZONE'));
                    if ($startDateTime < $endDateTime) {
                        $endRemainingTime = $endDateTime->diff($startDateTime);
                        $days = $endRemainingTime->days;
                        $hours = $endRemainingTime->h;
                        $minutes = $endRemainingTime->i;
                        $seconds = $endRemainingTime->s;
                        $all_inquiries['end_remaining_time'] = "End IN: $days d $hours h $minutes m $seconds s";
                    } else {
                        $store = Inquiry::where('id', $value->id)->first();
                        $store->status = 2;
                        $store->save();
                        $all_inquiries['end_remaining_time'] =null;
                    }
                    $all_inquiries['category'] = $value->category;
                    $all_inquiries['sub_category'] = $value->sub_category;
                    $all_inquiries['description'] = $value->description;
                    $all_inquiries['execution_date'] = date('d M, Y h:i A', strtotime($value->execution_date));
                    $all_inquiries['quotes_per_participants'] = $value->quotes_per_participants;
                    $all_inquiries['minimum_quote_amount'] = number_format($value->minimum_quote_amount,2, '.', ',');
                    $all_inquiries['maximum_quote_amount'] = number_format($value->maximum_quote_amount,2, '.', ',');
                    $all_inquiries['minimum_quote'] = $value->minimum_quote_amount;
                    $all_inquiries['maximum_quote'] = $value->maximum_quote_amount;
                    $all_inquiries['inquiry_type'] = $value->inquiry_type;
                    $all_inquiries['inquiry_amount'] = $value->inquiry_amount;
                    $all_inquiries['location'] = $value->location;
                    $all_inquiries['status'] = $value->status;
                    $all_inquiries['my_id'] = $value->my_id;
                    $all_inquiries['my_name'] = Auth::guard('web')->check() ? ucwords(Auth::guard('web')->user()->name) : "";
                    $all_inquiries['my_business_name'] = Auth::guard('web')->check() ? ucwords(Auth::guard('web')->user()->business_name) : "";
                    $all_inquiries['my_last_three_quotes'] = [];
                    
                    $getAllSellerQuotes = getAllSellerQuotes($value->id);
                    $my_mank = null;
                    if(count($getAllSellerQuotes)>0){
                        foreach($getAllSellerQuotes as $k =>$items){
                            if($items->seller_id ==$value->my_id){
                                $my_mank = $k+1;
                            }
                        }
                    }
                    $all_inquiries['my_mank'] = $my_mank;
                  
                   
                    foreach(get_last_three_quotes($value->id,$value->my_id) as $index =>$qItem){
                        $all_inquiries['my_last_three_quotes'][]=$qItem->quotes;
                    }

                    $count = 0;
                    $last_quotes = 0;
                    $quote_difference = 0; // Initialize the quote difference
                    // Iterate through the array
                    $array = $all_inquiries['my_last_three_quotes'];
                    for ($i = 0; $i < count($array) - 1; $i++) {
                        $last_quotes = $array[count($array) - 1];
                        $count++; 
                        if ($count >= 1) { // Check if the count is 2 or more
                            // Calculate the quote difference dynamically between the last index and the item before the last index
                            $quote_difference = abs($array[count($array) - 1] - $array[count($array) - 2]);

                            break; // Exit the loop once the condition is met
                        }
                    }
                    $all_inquiries['my_last_three_quotes'] = array_reverse($all_inquiries['my_last_three_quotes']);
                    $all_inquiries['quote_difference'] = $value->bid_difference_quote_amount;
                    $all_inquiries['last_quotes'] = $last_quotes;

                    $all_inquiries['left_quotes'] = $value->quotes_per_participants - get_my_all_quotes($value->id,$value->my_id);
                    $inquiries[] = $all_inquiries;
                }
            }
        }
        return view('front.seller_dashboard.pending_inquireis',compact('inquiries','all_inquery_count', 'group_wise_list_count', 'live_inquiries_count', 'pending_inquiries_count', 'confirmed_inquiries_count', 'rejected_inquiries_count'));
    }
    public function confirmed_inquiries(Request $request){
        $my_id = $this->getAuthenticatedUserId();
        $confirmed_inquiries =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller();  
        $group_wise_list_count =  $this->SellerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $all_inquery =  $this->SellerDashboardRepository->all_participants_inquiries_of_seller($this->getAuthenticatedUserId());
        $live_inquiries_count =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        $pending_inquiries_count =  $this->SellerDashboardRepository->pending_inquiries_by_seller();
        $confirmed_inquiries_count =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller(); 
        $rejected_inquiries =  $this->SellerDashboardRepository->rejected_inquiries_by_seller($this->getAuthenticatedUserId());
        $all_inquery_count = 0;
        foreach ( $all_inquery as  $item){
            if(empty(get_inquiry_seller_quotes($item->my_id, $item->id))){
                $all_inquery_count+=1;
            }
        }
        $rejected_inquiries_count = 0;
        foreach ($rejected_inquiries as  $item){
            if($item->my_id==$this->getAuthenticatedUserId()){
                $rejected_inquiries_count+=1;
            }
        }
        return view('front.seller_dashboard.confirmed_inquireis', compact('my_id','confirmed_inquiries','all_inquery_count', 'group_wise_list_count', 'live_inquiries_count', 'pending_inquiries_count', 'confirmed_inquiries_count', 'rejected_inquiries_count'));
    }
    public function history_inquiries(Request $request){
        $rejected_inquiries =  $this->SellerDashboardRepository->rejected_inquiries_by_seller($this->getAuthenticatedUserId());
        $group_wise_list_count =  $this->SellerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $all_inquery =  $this->SellerDashboardRepository->all_participants_inquiries_of_seller($this->getAuthenticatedUserId());
        $live_inquiries_count =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        $pending_inquiries_count =  $this->SellerDashboardRepository->pending_inquiries_by_seller();
        $confirmed_inquiries_count =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller(); 
        $rejected_inquiries =  $this->SellerDashboardRepository->rejected_inquiries_by_seller($this->getAuthenticatedUserId());
        $all_inquery_count = 0;
        foreach ( $all_inquery as  $item){
            if(empty(get_inquiry_seller_quotes($item->my_id, $item->id))){
                $all_inquery_count+=1;
            }
        }
        $rejected_inquiries_count = 0;
        foreach ($rejected_inquiries as  $item){
            if($item->my_id==$this->getAuthenticatedUserId()){
                $rejected_inquiries_count+=1;
            }
        }
        $distinct = [];
        foreach($rejected_inquiries as $key =>$item){
            $distinct[] = $item->id;
        }
        $distinct = array_unique($distinct);
        return view('front.seller_dashboard.history_inquireis', compact('rejected_inquiries', 'distinct','all_inquery_count', 'group_wise_list_count', 'live_inquiries_count', 'pending_inquiries_count', 'confirmed_inquiries_count', 'rejected_inquiries_count'));
    }
    public function seller_start_quotes(Request $request){
        // dd($request->all());
        // Start the transaction
        DB::beginTransaction();
        try {
            // Define validation rules
            $rules = [
                'bit_difference' => 'required|numeric'
            ];
        
            // Run the validator
            $validator = Validator::make($request->all(), $rules);
        
            // Additional validation to check if the input values are numeric
            if (!is_numeric($request->bit_difference)) {
                DB::rollBack(); // Roll back the transaction
                return redirect()->back()->with('error', 'Amount must be a valid number.');
            }
        
            // Check if validation fails
            if ($validator->fails()) {
                DB::rollBack(); // Roll back the transaction
                return redirect()->back()->with('error', 'Amount must be a valid number.');
            }
        
            // Validation passed, proceed to store data
            $store = new InquirySellerQuotes;
            $store->inquiry_id = $request->inquiry_id;
            $store->seller_id = $request->seller_id;
            $store->quotes = $request->bit_difference;
            $store->save();
            
            // Additional logic
            $seller_active_credit = $this->MasterRepository->getSellerActiveCredit($this->getAuthenticatedUserId());
            // selected_from==0 means open seller
            if($seller_active_credit > 0 && $request->selected_from==0){
                $MySellerWallet =new MySellerWallet;
                $MySellerWallet->user_id = $this->getAuthenticatedUserId();
                $MySellerWallet->type = 0;//Debit
                $MySellerWallet->debit_unit = 1;//for per inquiry
                $MySellerWallet->inquiry_id = $request->inquiry_code_id;//inquiry
                $MySellerWallet->purpose = "For participate in inquiry";//reason

                $MySellerWallet->current_unit = $seller_active_credit-1;
                $MySellerWallet->save();
                // SMS Notifications
            } else {
                if($seller_active_credit > 0 && $request->selected_from=="1"){
                     DB::commit();
                   return redirect()->route('seller_live_inquiries')->with('success', 'Quote submitted successfully.'); 
                }else{
                      DB::rollBack(); // Roll back the transaction
                    return redirect()->back()->with('error', 'You don\'t have active package or wallet balance.');
                    // Code to handle zero or negative active credit
                }
              
            }
    
            // Commit the transaction
            DB::commit();
            
            return redirect()->route('seller_live_inquiries')->with('success', 'Quote submitted successfully.');
        } catch (\Exception $e) {
            // Roll back the transaction
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while submitting the quote. Please try again.');
        }
    }

    public function new_quote_now(Request $request){
        $Inquiry = Inquiry::findOrFail($request->inquiry_id);
        if($Inquiry){
            $endDateTime = Carbon::parse($Inquiry->end_date . ' ' . $Inquiry->end_time)->timezone(env('APP_TIMEZONE'));
            $currentDateTime = Carbon::now();
            if ($currentDateTime < $endDateTime) {
                $store = new InquirySellerQuotes;
                $store->inquiry_id = $request->inquiry_id;
                $store->seller_id = $this->getAuthenticatedUserId();
                $store->quotes = $request->new_quote;
                $store->save();
                if($store){
                    return response()->json(['status'=>200]);
                }else{
                    return response()->json(['status'=>400]);
                }
            }else{
                return response()->json(['status'=>300]);
            }
            
        }else{
            return response()->json(['status'=>400]);
        }
        
    }
    public function seller_new_comment(Request $request){
        $store = new InquirySellerComments;
        $store->inquiry_id = $request->inquiry_id;
        $store->seller_id = $this->getAuthenticatedUserId();
        $store->comments = $request->new_comment;
        $store->save();
        if($store){
            return response()->json(['status'=>200]);
        }else{
            return response()->json(['status'=>400]);
        }
    }
    public function seller_send_new_file(Request $request){
        $request->validate([
            'inquiry_id' => 'required',
            'new_file' => 'required|file|mimes:pdf,image/*|max:2048', // Max file size: 2MB
        ]);
    
        if ($request->hasFile('new_file') && $request->file('new_file')->isValid()) {
            $file = $request->file('new_file');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller/file'), $imageName); // Save the file to the specified directory
            
            $uploadedImage = $imageName;

            $store = new InquirySellerComments;
            $store->inquiry_id = $request->inquiry_id;
            $store->seller_id = $this->getAuthenticatedUserId();
            $store->file = asset('uploads/seller/file/' . $uploadedImage); // Save the file path to the database
            $store->save();
    
            if ($store) {
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 400, 'message'=>'']);
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Invalid file or file upload failed.']);
        }
    }
    public function seller_send_new_bill(Request $request){
        $request->validate([
            'inquiry_id' => 'required',
            'new_bill' => 'required|file|mimes:pdf,image/*|max:2048', // Max file size: 2MB
        ]);
    
        if ($request->hasFile('new_bill') && $request->file('new_bill')->isValid()) {
            $file = $request->file('new_bill');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller/file'), $imageName); // Save the file to the specified directory

            $uploadedImage = $imageName;
            $store = Inquiry::findOrFail($request->inquiry_id);
            $store->bill_by = $this->getAuthenticatedUserId();
            $store->bill_at = date('Y-m-d h:i:s');
            $store->bill = asset('uploads/seller/bill/' . $uploadedImage); // Save the file path to the database
            $store->save();
    
            if ($store) {
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 400, 'message'=>'']);
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Invalid file or file upload failed.']);
        }
    }
    public function cancelled_reason(Request $request){
       $data = InquiryParticipant::where('inquiry_id', $request->inquiry_id)->where('user_id', $this->getAuthenticatedUserId())->first();
       if($data){
        $data->status = 2;
        $data->rejected_reason = $request->reason;
        $data->save();
        return redirect()->back()->with('success', 'Inquiry has been successfully rejected.');
       }else{
        return redirect()->back();
       }
    }
    public function after_confirm_seller_cancelled_reason(Request $request){
        // dd($request->all());
        $data = InquiryParticipant::where('inquiry_id', $request->inquiry_id)->where('user_id', $this->getAuthenticatedUserId())->first();
       if($data){
        $data->status = 2;
        $data->rejected_reason = $request->reason;
        $data->save();
        return redirect()->back()->with('success', 'You successfully rejected this Inquiry.');
       }else{
        return redirect()->back();
       }
    }
    public function setSessionAndRedirect(Request $request){
         // Set the intended URL in the session
         Session::put('url.intended', $request->intended_url);
         // Return the JSON response for redirect
         return response()->json([
             'redirect' => true,
             'redirect_url' => route('user.payment_management', ['package' => $request->type]),
             'error' => 'You do not have an active seller package.'
         ]);
    }
}
