<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\BuyerDashboardContract;
use App\Helper\helper;
use App\Models\Inquiry;
use App\Models\GroupWatchList;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BuyerDashboardRepository implements BuyerDashboardContract{
  
    private function getAuthenticatedUserId() {
        if (Auth::guard('web')->check()) {
            return Auth::guard('web')->user()->id;
        }
        return null;
    }
    public function get_all_existing_inquiries_by_user($id){
        return Inquiry::where('created_by', $id)->where('inquiry_id', '!=', null)->get();
    }
    public function group_wise_inquiries_by_user($id){
        return GroupWatchList::orderBy('group_name', 'ASC')->where('created_by',$id)->get();
    }
    public function saved_inquiries_by_user($id){
        return Inquiry::where('created_by',$id)->where('inquiry_id', null)->get();
    }
    public function live_inquiries_by_user($id){
        return Inquiry::with('ParticipantsData')->where('created_by',$id)->where('inquiry_id', '!=', null)->where('status', 1)->get();
    }
    
}
