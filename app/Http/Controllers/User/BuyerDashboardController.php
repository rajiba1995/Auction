<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Contracts\UserContract;
use App\Contracts\BuyerDashboardContract;
use App\Contracts\MasterContract;
use App\Models\Inquiry;
use App\Models\InquiryAllotmentData;
use App\Models\InquiryParticipant;
use App\Models\User;
use App\Models\InquirySellerQuotes;
use App\Models\InquirySellerComments;
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
        $saved_inquiries =  $this->BuyerDashboardRepository->saved_inquiries_by_user($this->getAuthenticatedUserId());
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        $confirmed_inquiry_data =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());
        $pending_inquiries_data =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());
        $cancelled_inquiry_data =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());


        return view('front.user_dashboard.index', compact('group_wise_list', 'existing_inquiries','saved_inquiries','live_inquiries','confirmed_inquiry_data','pending_inquiries_data','cancelled_inquiry_data'));
    }

    public function saved_inquiries(Request $request){
        $saved_inquiries =  $this->BuyerDashboardRepository->saved_inquiries_by_user($this->getAuthenticatedUserId());
        $group_wise_list =  $this->BuyerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        $confirmed_inquiry_data =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());
        $pending_inquiries_data =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());
        $cancelled_inquiry_data =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());



        return view('front.user_dashboard.saved_inquireis', compact('saved_inquiries','group_wise_list','live_inquiries','confirmed_inquiry_data','pending_inquiries_data','cancelled_inquiry_data'));
    }
    public function live_inquiries(Request $request){
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        $group_wise_list =  $this->BuyerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $saved_inquiries =  $this->BuyerDashboardRepository->saved_inquiries_by_user($this->getAuthenticatedUserId());
        $confirmed_inquiry_data =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());
        $pending_inquiries_data =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());
        $cancelled_inquiry_data =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());



        return view('front.user_dashboard.live_inquireis', compact('live_inquiries','saved_inquiries','group_wise_list','confirmed_inquiry_data','pending_inquiries_data','cancelled_inquiry_data'));
    }
    public function pending_inquiries(Request $request){
        $pending_inquiries_data =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());
        $group_wise_list =  $this->BuyerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $confirmed_inquiry_data =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());
        $cancelled_inquiry_data =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        $saved_inquiries =  $this->BuyerDashboardRepository->saved_inquiries_by_user($this->getAuthenticatedUserId());




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
                            $SellerFileData = SellerFileData($itemk->inquiry_id, $itemk->seller_id);
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller['seller_file_data'] = $SellerFileData;
                            $seller_data[]= $seller;
                        }
                    }
                    $all_inquiries['seller_data'] = $seller_data;
                
                $pending_inquiries[] = $all_inquiries;
            }
        }
        return view('front.user_dashboard.pending_inquireis', compact('pending_inquiries','live_inquiries','saved_inquiries','group_wise_list','confirmed_inquiry_data','pending_inquiries_data','cancelled_inquiry_data'));
    }
    public function confirmed_inquiries(Request $request){
        $confirmed_inquiry_data =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());
        $group_wise_list =  $this->BuyerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $pending_inquiries_data =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());
        $cancelled_inquiry_data =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        $saved_inquiries =  $this->BuyerDashboardRepository->saved_inquiries_by_user($this->getAuthenticatedUserId());


        $confirmed_inquiries = [];
        if(count($confirmed_inquiry_data)>0){
            foreach ($confirmed_inquiry_data as $key => $value) {
                $seller_data = [];
                $all_inquiries = [];
                $all_inquiries['id'] = $value->id;
                $all_inquiries['allot_seller'] = $value->allot_seller;
                $all_inquiries['inquiry_id'] = $value->inquiry_id;
                $all_inquiries['bill'] = $value->bill;
                $all_inquiries['bill_at'] = $value->bill_at;
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
                            $SellerFileData = SellerFileData($itemk->inquiry_id, $itemk->seller_id);
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller['seller_file_data'] = $SellerFileData;
                            $seller_data[]= $seller;
                        }
                    }
                    
                    $all_inquiries['seller_data'] = $seller_data;
                
                $confirmed_inquiries[] = $all_inquiries;
            }
        }
        return view('front.user_dashboard.confirmed_inquireis', compact('confirmed_inquiries','live_inquiries','saved_inquiries','group_wise_list','confirmed_inquiry_data','pending_inquiries_data','cancelled_inquiry_data'));
    }
    public function cancelled_inquiries(Request $request){
        $cancelled_inquiry_data =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());
        $group_wise_list =  $this->BuyerDashboardRepository->group_wise_inquiries_by_user($this->getAuthenticatedUserId());
        $saved_inquiries =  $this->BuyerDashboardRepository->saved_inquiries_by_user($this->getAuthenticatedUserId());
        $live_inquiries =  $this->BuyerDashboardRepository->live_inquiries_by_user($this->getAuthenticatedUserId());
        $confirmed_inquiry_data =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());
        $pending_inquiries_data =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());

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
                            $SellerFileData = SellerFileData($itemk->inquiry_id, $itemk->seller_id);
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller['seller_file_data'] = $SellerFileData;
                            $seller_data[]= $seller;
                        }
                    }
                    $all_inquiries['seller_data'] = $seller_data;
                
                $cancelled_inquiries[] = $all_inquiries;
            }
        }
        return view('front.user_dashboard.cancelled_inquireis', compact('cancelled_inquiries','group_wise_list','saved_inquiries','live_inquiries','confirmed_inquiry_data','pending_inquiries_data','cancelled_inquiry_data'));
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
                            $SellerFileData = SellerFileData($itemk->inquiry_id, $itemk->seller_id);
                           
                            $seller['seller_comments_data'] = $SellerCommentsData;
                            $seller['seller_file_data'] = $SellerFileData;
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
            
            $InquiryAllotmentData = new InquiryAllotmentData;
            $InquiryAllotmentData->inquiry_id = $request->inquiry_id;
            $InquiryAllotmentData->user_id = $request->bidder_id;
            $InquiryAllotmentData->quote = $request->allot_amount;
            $InquiryAllotmentData->reason = $request->type == 'old' ? $request->reallot_reason : null;
            $InquiryAllotmentData->save();

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
        // }else{
        //     return redirect()->back()->with('warning', 'Something went wrong. Please try again later.');
        // }
    }

    public function cancelled_reason(Request $request){
        // dd($request->all());
        if(isset($request->cancelled_reason)){
            $inquiry= Inquiry::findOrFail($request->id);
            $inquiry->cancelled_reason = $request->cancelled_reason;
            $inquiry->status = 4;  // here we do push evey paticipats staus ==2 in inquiry_participats table as buyer cancel the inquiry for reason
            $inquiry->save();

            // if ($inquiry) {
            //     $data = InquiryParticipant::where('inquiry_id', $inquiry->id)->get();
            //        // Loop through each record and update the status to 2
            //        foreach ($data as $participant) {
            //         $participant->update(['status' => 2]);
            //     }
            return redirect()->back()->with('success','Inquiry cancelled successfull.');
        }else{
            return redirect()->back()->with('warning','Please select the cancell reason.');
    }
    
    }
    public function InquiryPdfGenarate($id){
        // dd($id);
        $inquiry = Inquiry::where('id',$id)->first();
        $final_seller_details = User::where('id',$inquiry->allot_seller)->first();
        $buyer_details = User::where('id',$inquiry->created_by)->first();
        $max_rate = InquirySellerQuotes::where('inquiry_id', $id)->max('quotes');
        $min_rate = InquirySellerQuotes::where('inquiry_id', $id)->min('quotes');
        $seller_ids = InquirySellerQuotes::select('seller_id')
        ->where('inquiry_id', $id)
        ->groupBy('seller_id')
        ->pluck('seller_id')
        ->toArray();
        $seller_data = [];
        foreach($seller_ids as $key =>$seller_id){
            $latest_quote = InquirySellerQuotes::where('seller_id', $seller_id)->where('inquiry_id', $id)->latest()->first()->quotes;
            $first_quote = InquirySellerQuotes::where('seller_id', $seller_id)->where('inquiry_id', $id)->orderBy('id', 'ASC')->first()->quotes;
            $seller_comments = InquirySellerComments::where('seller_id', $seller_id)->where('inquiry_id', $id)->latest()->take(2)->get();
            // Get seller details from the User table
            $seller_details = User::find($seller_id);
            //  dd($seller_details);
        // Store the seller data
        $seller_data[$seller_id] = [
            'latest_quote' => $latest_quote,
            'first_quote' => $first_quote,
            'seller_details' => $seller_details,
            'seller_comments'=>$seller_comments
        ];
        
        }
        $data = [
            'inquiry' => $inquiry,
            'max_rate' => $max_rate,
            'min_rate' => $min_rate,
            'buyer_details' => $buyer_details,
            'final_seller_details' => $final_seller_details,
            'seller_data' => $seller_data,
            'seller_count' => count($seller_ids)
        ];
        $pdf = Pdf::loadView('admin.inquiry.generate-inquiry-pdf', $data);
        return $pdf->download('inquiry-pdf.pdf');
    }
}