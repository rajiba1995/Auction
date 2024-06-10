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
use DB;

class SellerDashboardRepository implements SellerDashboardContract{
  
    private function getAuthenticatedUserId() {
        if (Auth::guard('web')->check()) {
            return Auth::guard('web')->user()->id;
        }
        return null;
    }
    public function group_wise_inquiries_by_user($id){
        return DB::table('watchlists')
            ->select('watchlists.group_id', 'watchlists.seller_id', 'watchlists.buyer_id', 'sellers.name as seller_name', 'buyers.name as buyer_name','buyers.business_name as business_name','buyers.country_code as country_code','buyers.mobile as mobile', 'group_watchlist.group_name')
            ->join('users as sellers', 'sellers.id', '=', 'watchlists.seller_id')
            ->join('users as buyers', 'buyers.id', '=', 'watchlists.buyer_id')
            ->join('group_watchlist', 'group_watchlist.id', '=', 'watchlists.group_id')
            ->where('watchlists.seller_id', $id)
            ->whereNotNull('watchlists.group_id')
            ->get();
    }
    
    public function all_participants_inquiries_of_seller($id){
        return DB::table('inquiries')
            ->select('users.name as buyer_name', 'inquiry_participants.status as status','inquiry_participants.selected_from as selected_from', 'inquiry_participants.user_id as my_id', 'inquiries.*')
            ->join('inquiry_participants', 'inquiry_participants.inquiry_id', '=', 'inquiries.id')
            ->join('users', 'users.id', '=', 'inquiries.created_by')
            ->where('inquiry_participants.user_id', $id)
            ->where('inquiry_participants.status', 1)
            ->whereNotNull('inquiries.inquiry_id')
            ->orderBy('inquiries.created_at', 'DESC')
            ->get();
    }
    public function rejected_inquiries_by_seller($id){
        return Inquiry::with('BuyerData')
            ->select('inquiry_participants.user_id as my_id', 'inquiries.*', 'inquiry_participants.rejected_reason', 'inquiry_participants.status as participants_status')
            ->join('inquiry_participants', 'inquiry_participants.inquiry_id', '=', 'inquiries.id')
            ->join('users', 'users.id', '=', 'inquiries.created_by')
            ->where('inquiry_participants.user_id', $id)
            ->whereIn('inquiry_participants.status', [2, 3]) // 2: Seller own cancelled, 3: Buyer selected another seller
            ->orWhere('inquiries.status', 4) // Buyer Cancelled inquiry 
            // ->whereNotNull('inquiry_participants.rejected_reason')
            ->whereNotNull('inquiries.inquiry_id')
            ->orderBy('inquiries.created_at', 'DESC')
            ->get();
    }
    
    public function all_inquiries_of_seller($id){
        return Inquiry::where('id',$id)->get();
    }
    public function live_inquiries_by_seller(){
        return Inquiry::with('buyerData') // Eager load the 'buyerData' relationship
            ->select(
                'inquiries.*', 
                'inquiry_participants.user_id as my_id', 
                'inquiry_participants.status as my_quote_status', 
                'users.business_name as buyer_business_name', 
                'users.name as buyer_name', 
                'users.country_code as country_code',
                'users.mobile as buyer_mobile'
            )
            ->whereNotNull('inquiries.inquiry_id') // Filter inquiries where 'inquiry_id' is not null
            // ->where('inquiries.status', 1) // Filter inquiries with a status of 1
            ->join('inquiry_participants', 'inquiries.id', '=', 'inquiry_participants.inquiry_id') // Join 'inquiry_participants' table
            ->join('users', 'inquiries.created_by', '=', 'users.id') // Join 'users' table
            ->whereIn('inquiry_participants.status', [1,4,3]) 
            ->where('inquiry_participants.user_id', $this->getAuthenticatedUserId()) // Filter by authenticated user's ID
            ->get(); // Get the results
    }
    
    public function pending_inquiries_by_seller(){
        return Inquiry::with('buyerData') // Eager load the 'buyerData' relationship
        ->select(
            'inquiries.*', 
            'inquiry_participants.user_id as my_id', 
            'users.business_name as buyer_business_name', 
            'users.name as buyer_name', 
            'users.country_code as country_code',
            'users.mobile as buyer_mobile'
        )
        ->whereNotNull('inquiries.inquiry_id') // Filter inquiries where 'inquiry_id' is not null
        ->where('inquiries.status', 2) // Filter inquiries with a status of 1
        ->join('inquiry_participants', 'inquiries.id', '=', 'inquiry_participants.inquiry_id') // Join 'inquiry_participants' table
        ->join('users', 'inquiries.created_by', '=', 'users.id') // Join 'users' table
        ->where('inquiry_participants.user_id', $this->getAuthenticatedUserId()) // Filter by authenticated user's ID
        ->get(); // Get the results
    }
    public function confirmed_inquiries_by_seller(){
        return Inquiry::with('buyerData')
        ->select(
            'inquiries.*'
        )
        ->where('inquiries.inquiry_id', '!=', null)
        ->where('inquiries.status', 3)
        ->join('inquiry_participants', 'inquiries.id', '=', 'inquiry_participants.inquiry_id')
        ->where('inquiry_participants.user_id', $this->getAuthenticatedUserId())
        ->where('inquiry_participants.status', 4)
        ->where('inquiries.allot_seller', $this->getAuthenticatedUserId())
        ->get();
    }

}