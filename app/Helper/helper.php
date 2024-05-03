<?php

use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Career;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\State;
use App\Models\City;
use App\Models\InquirySellerQuotes;
use App\Models\WatchList;
use App\Models\InquirySellerComments;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


if (!function_exists('GetSellerByGroupId')) {
    function GetSellerByGroupId($group_id) {
        $WatchList = WatchList::where('group_id', $group_id)->get();
        return $WatchList;
    }
}
if (!function_exists('slugGenerate')) {
    function slugGenerate($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('title', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
if (!function_exists('slugGenerateUpdate')) {
    function slugGenerateUpdate($title, $table, $productId) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('title', $title)->where('id', '!=', $productId)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
if (!function_exists('GroupslugGenerate')) {
    function GroupslugGenerate($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('group_name', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
if (!function_exists('GroupslugGenerateUpdate')) {
    function GroupslugGenerateUpdate($title, $table, $productId) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('group_name', $title)->where('id', '!=', $productId)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
function genAutoIncreNoYearWiseInquiry($length=4,$table='inquiries',$year,$month){
    # PO , GRN, SALES ORDER , RETURN ORDER
    $val = 1;    
    $data = DB::table($table)->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = '".$year."-".$month."'  ")->count();

    if(!empty($data)){
        $val = ($data + 1);
    }

    $number = str_pad($val,$length,"0",STR_PAD_LEFT);
    
    return $year.''.$month.''.$number;
}

//cities
if (!function_exists('slugGenerateForCity')) {
    function slugGenerateForCity($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('name', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount);
        return $slug;
    }
}
if (!function_exists('slugGenerateUpdateForCity')) {
    function slugGenerateUpdateForCity($title, $table, $productId) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('name', $title)->where('id', '!=', $productId)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
//State
if (!function_exists('slugGenerateForState')) {
    function slugGenerateForState($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('name', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
if (!function_exists('slugGenerateUpdateForState')) {
    function slugGenerateUpdateForState($title, $table, $productId) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('name', $title)->where('id', '!=', $productId)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}


//Business_name_slug
if (!function_exists('slugGenerateForBusinessName')) {
    function slugGenerateForBusinessName($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('business_name', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
if (!function_exists('slugGenerateUpdateForBusinessName')) {
    function slugGenerateUpdateForBusinessName($title, $table, $productId) {
        $slug = Str::slug($title, '-');
        $originalSlug = $slug;
        $slugExistCount = DB::table($table)->where('business_name', $title)->where('id', '!=', $productId)->count();
        while ($slugExistCount > 0) {
            $slug = $originalSlug . '-' . ++$slugExistCount;
            // Check if the new slug exists
            $slugExistCount = DB::table($table)->where('slug_business_name', $slug)->count();
        }

        return $slug;
    }
}
function calculateSecondsRemaining($targetDateTime){
    $currentDateTime = date("Y-m-d H:i:s");
    $currentTimestamp = strtotime($currentDateTime);
    $targetTimestamp = strtotime($targetDateTime);
    $difference = $targetTimestamp - $currentTimestamp;
    return max(0, $difference);
}
function calculateEndSecondsRemaining($targetDateTime){
    $currentDateTime = date("Y-m-d H:i:s");
    $currentTimestamp = strtotime($currentDateTime);
    $targetTimestamp = strtotime($targetDateTime);
    $difference = $currentTimestamp-$targetTimestamp;
    return max(0, $difference);
}
function getCity($id){
    // Retrieve the city record from the database based on the provided ID
    $city = City::where('id', $id)->first();

    // Check if a city record was found
    if($city){
        // If a city record was found, return its name
        return $city->name;
    } else {
        // If no city record was found, return false
        return false;
    }
}
function getCitySlug($id){
    // Retrieve the city record from the database based on the provided ID
    $city = City::where('id', $id)->first();
    // Check if a city record was found
    if($city->slug){
        // If a city record was found, return its name
        return $city->slug;
    } else {
        // If no city record was found, return false
        return  Str::slug($city->name, '-');
    }
}
function getState($id){
    $State = State::where('id', $id)->first();
    if($State){
        return $State->name;
    } else {
        return false;
    }
}
function getAllSellerQuotes($id){
    $data = DB::table('inquiry_seller_quotes AS iq')
    ->select('iq.*', 'users.name', 'users.id', 'users.country_code', 'users.mobile', 'users.business_name')
    ->join(DB::raw('(SELECT seller_id, MAX(quotes) AS max_quotes
                    FROM inquiry_seller_quotes
                    WHERE inquiry_id = '.$id.'
                    GROUP BY seller_id) AS subquery'), function($join) {
        $join->on('iq.seller_id', '=', 'subquery.seller_id')
             ->on('iq.quotes', '=', 'subquery.max_quotes');
    })
    ->join('users', 'iq.seller_id', '=', 'users.id')
    ->where('iq.inquiry_id', '=', $id)
    ->orderBy('iq.quotes', 'DESC')->limit(10)
    ->get();
    if($data){
        return $data;
    }else{
        return false;
    }
}

function get_last_three_quotes($inquiry_id, $seller_id){
   return InquirySellerQuotes::latest()->where('inquiry_id', $inquiry_id)->where('seller_id', $seller_id)->take(3)->get();
}
function get_my_all_quotes($inquiry_id, $seller_id){
   return InquirySellerQuotes::latest()->where('inquiry_id', $inquiry_id)->where('seller_id', $seller_id)->get()->count();
}
function get_inquiry_seller_quotes($seller_id, $inquiry_id){
    return InquirySellerQuotes::where('inquiry_id', $inquiry_id)->where('seller_id', $seller_id)->first();
}
function valid_live_time($start_time, $end_time){
    $startDateTime = Carbon::parse($start_time)->timezone(env('APP_TIMEZONE'));
    $endDateTime = Carbon::parse($end_time)->timezone(env('APP_TIMEZONE'));
    $now = Carbon::now();
    if ($startDateTime > $now) {
        return false;
    }elseif($startDateTime<$now){
        return false;
    }else{
        return true;
    }
}
function SellerCommentsData($inquiry_id, $seller_id){
    return InquirySellerComments::where('seller_id', $seller_id)->where('inquiry_id', $inquiry_id)->get();
}
function valid_execution_time($execution_time){
    $startDateTime = Carbon::parse($execution_time)->timezone(env('APP_TIMEZONE'));
    $endDateTime = Carbon::now();
    if($startDateTime > $endDateTime){
        return true;
    }else{
         return false;
    }   

}