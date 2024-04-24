<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\AdminInquiryContract;

use App\Models\Admin;
use App\Models\EmployeeAttandance;
use App\Models\User;
use App\Models\Inquiry;
use App\Models\EmployeeRole;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class AdminInquiryRepository implements AdminInquiryContract
{
    public function getAllInquiries(){
        return Inquiry::where('inquiry_id','!=',null)->paginate(20);
    }
    public function getInquiryDetailsById($id){
        return Inquiry::findOrFail($id);
    }
    public function getSearchInquery($keyword,$startDate,$endDate)
    {
        $query = Inquiry::query();

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('inquiry_id', 'like', '%' . $keyword . '%')
                ->orWhere('title', 'like', '%' . $keyword . '%')
                ->orWhere('location', 'like', '%' . $keyword . '%')
                ->orWhere('inquiry_amount', 'like', '%' . $keyword . '%')
                ->orWhere('category', 'like', '%' . $keyword . '%')
                ->orWhere('sub_category', 'like', '%' . $keyword . '%');
        }); // Move the status condition here

        if (!is_null($startDate) && !is_null($endDate)) {
            $query->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->where('created_at', '>=', $startDate . " 00:00:00")
                    ->where('created_at', '<=', date("Y-m-d 23:59:59", strtotime($endDate)));
            });
        }

        return $data = $query->latest('id')->paginate(25);
        
    }

    public function getSearchInquriesByStatus($status)
    {
        return Inquiry::where([['status', 'LIKE', '%' . $status . '%']])->paginate(20);   

    }
}