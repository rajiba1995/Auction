<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\SellerDashboardContract;
use App\Helper\helper;
use App\Models\Inquiry;
use App\Models\InquiryParticipant;
use App\Models\GroupWatchList;
use App\Models\WatchList;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SellerDashboardRepository implements SellerDashboardContract{
  
    private function getAuthenticatedUserId() {
        if (Auth::guard('web')->check()) {
            return Auth::guard('web')->user()->id;
        }
        return null;
    }
    public function group_wise_inquiries_by_user($id){
        return WatchList::where('seller_id',$id)->get();
    }
    public function all_participants_inquiries_of_seller($id){
        return InquiryParticipant::where('user_id',$id)->get();
    }
    public function all_inquiries_of_seller($id){
        // dd($id);
        return Inquiry::where('id',$id)->get();
    }
}