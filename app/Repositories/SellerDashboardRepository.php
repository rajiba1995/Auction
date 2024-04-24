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
use Auth;
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
        return Inquiry::where('id',$id)->get();
    }
    public function live_inquiries_by_seller(){
        return Inquiry::with('buyerData')
        ->select(
            'inquiries.inquiry_id',
            'inquiries.created_by',
            'inquiries.title',
            'inquiries.slug',
            'inquiries.start_date',
            'inquiries.start_time',
            'inquiries.end_date',
            'inquiries.end_time',
            'inquiries.category',
            'inquiries.sub_category',
            'inquiries.description',
            'inquiries.execution_date',
            'inquiries.quotes_per_participants',
            'inquiries.minimum_quote_amount',
            'inquiries.maximum_quote_amount',
            'inquiries.inquiry_type',
            'inquiries.inquiry_amount',
            'inquiries.location',
            'inquiries.location_type',
            'inquiries.status',
            'inquiries.buyer_note',
            'inquiries.created_at',
            'inquiries.updated_at'
        )
        ->where('inquiries.inquiry_id', '!=', null)
        ->where('inquiries.status', 1)
        ->join('inquiry_participants', 'inquiries.id', '=', 'inquiry_participants.inquiry_id')
        ->where('inquiry_participants.user_id', $this->getAuthenticatedUserId())
        ->get();
    }
    public function pending_inquiries_by_seller(){
        return Inquiry::with('buyerData')
        ->select(
            'inquiries.inquiry_id',
            'inquiries.created_by',
            'inquiries.title',
            'inquiries.slug',
            'inquiries.start_date',
            'inquiries.start_time',
            'inquiries.end_date',
            'inquiries.end_time',
            'inquiries.category',
            'inquiries.sub_category',
            'inquiries.description',
            'inquiries.execution_date',
            'inquiries.quotes_per_participants',
            'inquiries.minimum_quote_amount',
            'inquiries.maximum_quote_amount',
            'inquiries.inquiry_type',
            'inquiries.inquiry_amount',
            'inquiries.location',
            'inquiries.location_type',
            'inquiries.status',
            'inquiries.buyer_note',
            'inquiries.created_at',
            'inquiries.updated_at'
        )
        ->where('inquiries.inquiry_id', '!=', null)
        ->where('inquiries.status', 2)
        ->join('inquiry_participants', 'inquiries.id', '=', 'inquiry_participants.inquiry_id')
        ->where('inquiry_participants.user_id', $this->getAuthenticatedUserId())
        ->get();
    }
    public function confirmed_inquiries_by_seller(){
        return Inquiry::with('buyerData')
        ->select(
            'inquiries.inquiry_id',
            'inquiries.created_by',
            'inquiries.title',
            'inquiries.slug',
            'inquiries.start_date',
            'inquiries.start_time',
            'inquiries.end_date',
            'inquiries.end_time',
            'inquiries.category',
            'inquiries.sub_category',
            'inquiries.description',
            'inquiries.execution_date',
            'inquiries.quotes_per_participants',
            'inquiries.minimum_quote_amount',
            'inquiries.maximum_quote_amount',
            'inquiries.inquiry_type',
            'inquiries.inquiry_amount',
            'inquiries.location',
            'inquiries.location_type',
            'inquiries.status',
            'inquiries.buyer_note',
            'inquiries.created_at',
            'inquiries.updated_at'
        )
        ->where('inquiries.inquiry_id', '!=', null)
        ->where('inquiries.status', 3)
        ->join('inquiry_participants', 'inquiries.id', '=', 'inquiry_participants.inquiry_id')
        ->where('inquiry_participants.user_id', $this->getAuthenticatedUserId())
        ->get();
    }
   


    
}