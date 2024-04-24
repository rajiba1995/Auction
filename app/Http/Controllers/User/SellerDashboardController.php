<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\SellerDashboardContract;
use App\Contracts\MasterContract;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
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
        return view('front.seller_dashboard.index',compact('group_wise_list'));
    }
    public function all_inquiries(Request $request){
        $all_inquery =  $this->SellerDashboardRepository->all_participants_inquiries_of_seller($this->getAuthenticatedUserId());
        return view('front.seller_dashboard.all_inquireis',compact('all_inquery'));
    }
    public function live_inquiries(Request $request){
        $live_inquiries =  $this->SellerDashboardRepository->live_inquiries_by_seller();   
        return view('front.seller_dashboard.live_inquireis', compact('live_inquiries'));
    }
    public function pending_inquiries(Request $request){
        $pending_inquiries =  $this->SellerDashboardRepository->pending_inquiries_by_seller();   
        return view('front.seller_dashboard.pending_inquireis',compact('pending_inquiries'));
    }
    public function confirmed_inquiries(Request $request){
        $confirmed_inquiries =  $this->SellerDashboardRepository->confirmed_inquiries_by_seller();  
        return view('front.seller_dashboard.confirmed_inquireis', compact('confirmed_inquiries'));
    }
    public function history_inquiries(Request $request){
        // $live_inquiries =  $this->SellerDashboardRepository->live_inquiries_by_seller();
        // dd('history');   
        return view('front.seller_dashboard.history_inquireis');
    }
}