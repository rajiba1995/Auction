<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\BuyerDashboardContract;
use App\Contracts\MasterContract;
use App\Models\Inquiry;
use App\Models\InquiryParticipant;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;



class BuyerDashboardController extends Controller
{
    protected $userRepository;
    protected $MasterRepository;
    protected $BuyerDashboardRepository;

    public function __construct(UserContract $userRepository, MasterContract $MasterRepository, BuyerDashboardContract $BuyerDashboardRepository) {
        $this->userRepository = $userRepository;
        $this->MasterRepository = $MasterRepository;
        $this->BuyerDashboardRepository = $BuyerDashboardRepository;

    }
    private function getAuthenticatedUserId() {
        if (Auth::guard('web')->check()) {
            return Auth::guard('web')->user()->id;
        }
        return null;
    }

    public function index(Request $request){
        $existing_inquiries= $this->BuyerDashboardRepository->get_all_existing_inquiries_by_user($this->getAuthenticatedUserId());
        $group_wise_list =  $this->BuyerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        return view('front.user_dashboard.index', compact('group_wise_list', 'existing_inquiries'));
    }

    public function saved_inquiries(Request $request){
        $saved_inquiries =  $this->BuyerDashboardRepository->saved_inquiries_by_user($this->getAuthenticatedUserId());
        return view('front.user_dashboard.saved_inquireis', compact('saved_inquiries'));
    }
    public function live_inquiries(Request $request){
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        return view('front.user_dashboard.live_inquireis', compact('live_inquiries'));
    }
    public function pending_inquiries(Request $request){
        $pending_inquiries_data =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());
        $pending_inquiries = [];
        if(count($pending_inquiries_data)>0){
            foreach ($pending_inquiries_data as $key => $value) {
                $seller_data = [];
                $all_inquiries = [];
                $all_inquiries['id'] = $value->id;
                $all_inquiries['inquiry_id'] = $value->inquiry_id;
                $all_inquiries['created_by'] = $value->BuyerData->name;
                $all_inquiries['title'] = $value->title;
                $all_inquiries['start_date_time'] = date('d M, Y h:i A', strtotime($value->start_date.' '.$value->start_time));
                
                $all_inquiries['end_date_time'] = date('d M, Y h:i A', strtotime($value->end_date.' '.$value->end_time));
               
                $all_inquiries['category'] = $value->category;
                $all_inquiries['sub_category'] = $value->sub_category;
                $all_inquiries['description'] = $value->description;
                $all_inquiries['execution_date'] = $value->execution_date;
                $all_inquiries['quotes_per_participants'] = $value->quotes_per_participants;
                $all_inquiries['minimum_quote_amount'] = $value->minimum_quote_amount;
                $all_inquiries['maximum_quote_amount'] = $value->maximum_quote_amount;
                $all_inquiries['inquiry_type'] = $value->inquiry_type;
                $all_inquiries['inquiry_amount'] = $value->inquiry_amount;
                $all_inquiries['location'] = $value->location;
                $all_inquiries['status'] = $value->status;

                if($value->ParticipantsData){
                    foreach($value->ParticipantsData as $k =>$item){
                        $all_inquiries['participants'][]= $item->SellerData->business_name;
                        // if($item->status==1){
                            $all_inquiries['invted_participants'][]= $item->SellerData->business_name;
                        // }
                    }
                }
                $all_inquiries['invted_participants_count'] = count($all_inquiries['participants']);
                $getAllSellerQuotes = getAllSellerQuotes($value->id);
                $all_inquiries['participants_count'] = count($all_inquiries['invted_participants']);
                    if(count($getAllSellerQuotes)>0){
                        foreach($getAllSellerQuotes as $k =>$itemk){
                            $seller = [];
                            $seller['id'] = $itemk->id;
                            $seller['inquiry_id'] = $itemk->inquiry_id;
                            $seller['seller_id'] = $itemk->seller_id;
                            $seller['name'] = $itemk->name;
                            $seller['country_code'] = $itemk->country_code;
                            $seller['mobile'] = $itemk->mobile;
                            $seller['business_name'] = $itemk->business_name;
                            $seller['last_three_quotes'] = [];
                            foreach(get_last_three_quotes($itemk->inquiry_id,$itemk->seller_id) as $index=> $qItem){
                                $seller['last_three_quotes'][]=$qItem->quotes; 
                                if($index==0){
                                    $seller['quotes'] = $itemk->quotes;
                                }
                            }
                            $seller['last_three_quotes'] = array_reverse($seller['last_three_quotes']);
                            $SellerCommentsData = SellerCommentsData($itemk->inquiry_id, $itemk->seller_id);
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller_data[]= $seller;
                        }
                    }
                    $all_inquiries['seller_data'] = $seller_data;
                
                $pending_inquiries[] = $all_inquiries;
            }
        }
        return view('front.user_dashboard.pending_inquireis', compact('pending_inquiries'));
    }
    public function confirmed_inquiries(Request $request){
        $confirmed_inquiry_data =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());

        $confirmed_inquiries = [];
        if(count($confirmed_inquiry_data)>0){
            foreach ($confirmed_inquiry_data as $key => $value) {
                $seller_data = [];
                $all_inquiries = [];
                $all_inquiries['id'] = $value->id;
                $all_inquiries['allot_seller'] = $value->allot_seller;
                $all_inquiries['inquiry_id'] = $value->inquiry_id;
                $all_inquiries['created_by'] = $value->BuyerData->name;
                $all_inquiries['title'] = $value->title;
                $all_inquiries['start_date_time'] = date('d M, Y h:i A', strtotime($value->start_date.' '.$value->start_time));
                
                $all_inquiries['end_date_time'] = date('d M, Y h:i A', strtotime($value->end_date.' '.$value->end_time));
               
                $all_inquiries['category'] = $value->category;
                $all_inquiries['sub_category'] = $value->sub_category;
                $all_inquiries['description'] = $value->description;
                $all_inquiries['execution_date'] = $value->execution_date;
                $all_inquiries['quotes_per_participants'] = $value->quotes_per_participants;
                $all_inquiries['minimum_quote_amount'] = $value->minimum_quote_amount;
                $all_inquiries['maximum_quote_amount'] = $value->maximum_quote_amount;
                $all_inquiries['inquiry_type'] = $value->inquiry_type;
                $all_inquiries['inquiry_amount'] = $value->inquiry_amount;
                $all_inquiries['location'] = $value->location;
                $all_inquiries['status'] = $value->status;

                if($value->ParticipantsData){
                    foreach($value->ParticipantsData as $k =>$item){
                        $all_inquiries['participants'][]= $item->SellerData->business_name;
                        // if($item->status==1){
                            $all_inquiries['invted_participants'][]= $item->SellerData->business_name;
                        // }
                    }
                }
                $all_inquiries['invted_participants_count'] = count($all_inquiries['participants']);
                $getAllSellerQuotes = getAllSellerQuotes($value->id);
                $all_inquiries['participants_count'] = count($all_inquiries['invted_participants']);
                    if(count($getAllSellerQuotes)>0){
                        foreach($getAllSellerQuotes as $k =>$itemk){
                            $seller = [];
                            $seller['id'] = $itemk->id;
                            $seller['inquiry_id'] = $itemk->inquiry_id;
                            $seller['seller_id'] = $itemk->seller_id;
                            $seller['quotes'] = $itemk->quotes;
                            $seller['name'] = $itemk->name;
                            $seller['country_code'] = $itemk->country_code;
                            $seller['mobile'] = $itemk->mobile;
                            $seller['business_name'] = $itemk->business_name;
                            $seller['last_three_quotes'] = [];
                            foreach(get_last_three_quotes($itemk->inquiry_id,$itemk->seller_id) as $qItem){
                                $seller['last_three_quotes'][]=$qItem->quotes; 
                            }
                            $seller['last_three_quotes'] = array_reverse($seller['last_three_quotes']);
                            $SellerCommentsData = SellerCommentsData($itemk->inquiry_id, $itemk->seller_id);
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller_data[]= $seller;
                        }
                    }
                    $all_inquiries['seller_data'] = $seller_data;
                
                $confirmed_inquiries[] = $all_inquiries;
            }
        }
        return view('front.user_dashboard.confirmed_inquireis', compact('confirmed_inquiries'));
    }
    public function cancelled_inquiries(Request $request){
        $cancelled_inquiry_data =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());

        $cancelled_inquiries = [];
        if(count($cancelled_inquiry_data)>0){
            foreach ($cancelled_inquiry_data as $key => $value) {
                $seller_data = [];
                $all_inquiries = [];
                $all_inquiries['id'] = $value->id;
                $all_inquiries['allot_seller'] = $value->allot_seller;
                $all_inquiries['inquiry_id'] = $value->inquiry_id;
                $all_inquiries['created_by'] = $value->BuyerData->name;
                $all_inquiries['title'] = $value->title;
                $all_inquiries['start_date_time'] = date('d M, Y h:i A', strtotime($value->start_date.' '.$value->start_time));
                
                $all_inquiries['end_date_time'] = date('d M, Y h:i A', strtotime($value->end_date.' '.$value->end_time));
               
                $all_inquiries['category'] = $value->category;
                $all_inquiries['sub_category'] = $value->sub_category;
                $all_inquiries['description'] = $value->description;
                $all_inquiries['execution_date'] = $value->execution_date;
                $all_inquiries['quotes_per_participants'] = $value->quotes_per_participants;
                $all_inquiries['minimum_quote_amount'] = $value->minimum_quote_amount;
                $all_inquiries['maximum_quote_amount'] = $value->maximum_quote_amount;
                $all_inquiries['inquiry_type'] = $value->inquiry_type;
                $all_inquiries['inquiry_amount'] = $value->inquiry_amount;
                $all_inquiries['location'] = $value->location;
                $all_inquiries['status'] = $value->status;

                if($value->ParticipantsData){
                    foreach($value->ParticipantsData as $k =>$item){
                        $all_inquiries['participants'][]= $item->SellerData->business_name;
                        // if($item->status==1){
                            $all_inquiries['invted_participants'][]= $item->SellerData->business_name;
                        // }
                    }
                }
                $all_inquiries['invted_participants_count'] = count($all_inquiries['participants']);
                $getAllSellerQuotes = getAllSellerQuotes($value->id);
                $all_inquiries['participants_count'] = count($all_inquiries['invted_participants']);
                    if(count($getAllSellerQuotes)>0){
                        foreach($getAllSellerQuotes as $k =>$itemk){
                            $seller = [];
                            $seller['id'] = $itemk->id;
                            $seller['inquiry_id'] = $itemk->inquiry_id;
                            $seller['seller_id'] = $itemk->seller_id;
                            $seller['quotes'] = $itemk->quotes;
                            $seller['name'] = $itemk->name;
                            $seller['country_code'] = $itemk->country_code;
                            $seller['mobile'] = $itemk->mobile;
                            $seller['business_name'] = $itemk->business_name;
                            $seller['last_three_quotes'] = [];
                            foreach(get_last_three_quotes($itemk->inquiry_id,$itemk->seller_id) as $qItem){
                                $seller['last_three_quotes'][]=$qItem->quotes; 
                            }
                            $seller['last_three_quotes'] = array_reverse($seller['last_three_quotes']);
                            $SellerCommentsData = SellerCommentsData($itemk->inquiry_id, $itemk->seller_id);
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller_data[]= $seller;
                        }
                    }
                    $all_inquiries['seller_data'] = $seller_data;
                
                $cancelled_inquiries[] = $all_inquiries;
            }
        }
        return view('front.user_dashboard.cancelled_inquireis', compact('cancelled_inquiries'));
    }

    public function live_inquiries_fetch_ajax(){
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        $inquiries = [];
        if(count($live_inquiries)>0){
            foreach ($live_inquiries as $key => $value) {
                $seller_data = [];
                $all_inquiries = [];
                $all_inquiries['id'] = $value->id;
                $all_inquiries['inquiry_id'] = $value->inquiry_id;
                $all_inquiries['created_by'] = $value->BuyerData->name;
                $all_inquiries['title'] = $value->title;
                $all_inquiries['start_date_time'] = date('d M, Y h:i A', strtotime($value->start_date.' '.$value->start_time));
                 // Calculate remaining time until start date/time
                 $startDateTime = Carbon::parse($value->start_date . ' ' . $value->start_time)->timezone(env('APP_TIMEZONE'));
                 $currentDateTime = Carbon::now();
                 
                 if ($currentDateTime < $startDateTime) {
                     $startRemainingTime = $startDateTime->diff($currentDateTime);
                     $days = $startRemainingTime->days;
                     $hours = $startRemainingTime->h;
                     $minutes = $startRemainingTime->i;
                     $seconds = $startRemainingTime->s;
                     
                     $all_inquiries['start_remaining_time'] = "Starts in: $days d $hours h $minutes m $seconds s";
                 } else {
                     $all_inquiries['start_remaining_time'] = null;
                 }
                 
                 // Calculate remaining time until end date/time
                 $endDateTime = Carbon::parse($value->end_date . ' ' . $value->end_time)->timezone(env('APP_TIMEZONE'));
                 
                 if ($currentDateTime < $endDateTime) {
                     $endRemainingTime = $endDateTime->diff($currentDateTime);
                     $days = $endRemainingTime->days;
                     $hours = $endRemainingTime->h;
                     $minutes = $endRemainingTime->i;
                     $seconds = $endRemainingTime->s;
                     $all_inquiries['end_date_time'] = date('d M, Y h:i A', strtotime($value->end_date.' '.$value->end_time));
                     $all_inquiries['end_remaining_time'] = "Ends in: $days d $hours h $minutes m $seconds s";
                 } else {
                     $store = Inquiry::find($value->id);
                     $store->status = 2;
                     $store->save();
                     $all_inquiries['end_remaining_time'] = "";
                 }
                $all_inquiries['category'] = $value->category;
                $all_inquiries['sub_category'] = $value->sub_category;
                $all_inquiries['description'] = $value->description;
                $all_inquiries['execution_date'] = $value->execution_date;
                $all_inquiries['quotes_per_participants'] = $value->quotes_per_participants;
                $all_inquiries['minimum_quote_amount'] = $value->minimum_quote_amount;
                $all_inquiries['maximum_quote_amount'] = $value->maximum_quote_amount;
                $all_inquiries['inquiry_type'] = $value->inquiry_type;
                $all_inquiries['inquiry_amount'] = $value->inquiry_amount;
                $all_inquiries['location'] = $value->location;
                $all_inquiries['status'] = $value->status;

                if($value->ParticipantsData){
                    foreach($value->ParticipantsData as $k =>$item){
                        $all_inquiries['participants'][]= $item->SellerData->business_name;
                        if($item->status==1){
                            $all_inquiries['invted_participants'][]= $item->SellerData->business_name;
                        }
                    }
                }
                $all_inquiries['invted_participants_count'] = count($all_inquiries['participants']);
                $getAllSellerQuotes = getAllSellerQuotes($value->id);
                $all_inquiries['participants_count'] = count($all_inquiries['invted_participants']);
                    if(count($getAllSellerQuotes)>0){
                        foreach($getAllSellerQuotes as $k =>$itemk){
                            $seller = [];
                            $seller['id'] = $itemk->id;
                            $seller['inquiry_id'] = $itemk->inquiry_id;
                            $seller['seller_id'] = $itemk->seller_id;
                            // $seller['quotes'] = $itemk->quotes;
                            $seller['name'] = $itemk->name;
                            $seller['country_code'] = $itemk->country_code;
                            $seller['mobile'] = $itemk->mobile;
                            $seller['business_name'] = $itemk->business_name;
                            $seller['last_three_quotes'] = [];
                            foreach($get_last_three_quotes = get_last_three_quotes($itemk->inquiry_id,$itemk->seller_id) as $index=> $qItem){
                                $seller['last_three_quotes'][]=$qItem->quotes;
                            }
                            $seller['quotes'] = $get_last_three_quotes[0]->quotes;
                            
                            $seller['last_three_quotes'] = array_reverse($seller['last_three_quotes']);
                            $SellerCommentsData = SellerCommentsData($itemk->inquiry_id, $itemk->seller_id);
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller_data[]= $seller;
                        }
                    }
                    $all_inquiries['seller_data'] = $seller_data;
                
                $inquiries[] = $all_inquiries;
            }
        }
        // dd($inquiries);
        if(count($inquiries)>0){
            return response()->json(['status'=>200, 'data'=>$inquiries]);
        }else{
            return response()->json(['status'=>400]);
        }
    }

    public function live_inquiry_seller_allot(Request $request){
        if($request->allotrate=="yes"){
            $inquiry= Inquiry::findOrFail($request->inquiry_id);
            $inquiry->allot_seller = $request->bidder_id;
            $inquiry->inquiry_amount = $request->allot_amount;
            $inquiry->status = 3; //Confirmed
            $inquiry->save();
            if ($inquiry) {
                $data = InquiryParticipant::where('inquiry_id', $inquiry->id)
                                          ->where('user_id', '!=', $inquiry->allot_seller)
                                          ->get();
                
                // Loop through each record and update the status to 3
                foreach ($data as $participant) {
                    $participant->update(['status' => 3, 'rejected_reason'=>'Buyer selected another supplier']);
                }
                $allot_seller = InquiryParticipant::where('inquiry_id', $inquiry->id)
                                          ->where('user_id', $inquiry->allot_seller)
                                          ->first();
                if($allot_seller){
                    $allot_seller->status = 4; //Allot
                    $allot_seller->rejected_reason = null;
                    $allot_seller->save();
                }
            }
            return redirect()->route('buyer_confirmed_inquiries')->with('success', 'Seller has been successfully allocated.');
        }else{
            return redirect()->back()->with('warning', 'Something went wrong. Please try again later.');
        }
    }

    public function cancelled_reason(Request $request){
        // dd($request->all());
        if(isset($request->cancelled_reason)){
            $inquiry= Inquiry::findOrFail($request->id);
            $inquiry->status = 4;
            $inquiry->cancelled_reason = $request->cancelled_reason;
            $inquiry->save();
            return redirect()->back()->with('success','Inquiry cancelled successfull.');
        }else{
            return redirect()->back()->with('warning','Please select the cancell reason.');
    }
    
    }
}