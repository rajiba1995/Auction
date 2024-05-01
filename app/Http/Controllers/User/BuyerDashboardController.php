<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\BuyerDashboardContract;
use App\Contracts\MasterContract;
use App\Models\Inquiry;
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
        $pending_inquiries =  $this->BuyerDashboardRepository->pending_inquiries_by_user($this->getAuthenticatedUserId());
        return view('front.user_dashboard.pending_inquireis', compact('pending_inquiries'));
    }
    public function confirmed_inquiries(Request $request){
        $confirmed_inquiries =  $this->BuyerDashboardRepository->confirmed_inquiries_by_user($this->getAuthenticatedUserId());
        return view('front.user_dashboard.confirmed_inquireis', compact('confirmed_inquiries'));
    }
    public function cancelled_inquiries(Request $request){
        $cancelled_inquiries =  $this->BuyerDashboardRepository->cancelled_inquiries_by_user($this->getAuthenticatedUserId());
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
                    $inquiries = Inquiry::findOrFail($value->id);
                    $inquiries->status = 2;
                    $inquiries->save();
                    $all_inquiries['end_remaining_time'] =null;
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
                            $seller['quotes'] = $itemk->quotes;
                            $seller['name'] = $itemk->name;
                            $seller['country_code'] = $itemk->country_code;
                            $seller['mobile'] = $itemk->mobile;
                            $seller['business_name'] = $itemk->business_name;
                            $seller['last_three_quotes'] = [];
                            foreach(get_last_three_quotes($itemk->inquiry_id,$itemk->seller_id) as $qItem){
                                $seller['last_three_quotes'][]=$qItem->quotes; 
                            }
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
    
}