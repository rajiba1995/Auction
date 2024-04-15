<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\BuyerDashboardContract;
use App\Contracts\MasterContract;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
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
    
}