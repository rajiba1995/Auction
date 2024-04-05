<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\BuyerDashboardContract;
use App\Helper\helper;
use App\Models\Inquiry;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BuyerDashboardRepository implements BuyerDashboardContract{
  
    public function get_all_existing_inquiries_by_user($id){
        return Inquiry::where('created_by', $id)->where('inquiry_id', '!=', null)->get();
    }
}
