<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\PackageContract;

use App\Models\Banner;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Tutorial;
use App\Models\Client;
use App\Models\Feedback;
use App\Models\SocialMedia;
use App\Models\WebsiteLogs;
use App\Models\Package;
use App\Models\SellerPackage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Auth;





class PackageRepository implements PackageContract
{

 //Buyer
 public function getAllBuyerPackages()
 {
     return Package::latest()->where('deleted_at', 1)->paginate(20);
 }
 public function CreateBuyerPackage(array $data)
 {
     try {
         $package = new Package();
         $collection = collect($data);
         $package->package_name = $collection['package_name'];
         $package->rupees_prefix = $collection['rupees_prefix'];
         $package->package_price = $collection['package_price'];
         $package->package_type = $collection['package_type'];
         $package->package_duration = $collection['package_duration'];
         $package->inquiry_auction = 0;
         $package->total_number_of_auction = $collection['total_number_of_auction'];
         $package->total_cost_per_auction = $collection['total_cost_per_inquiry'];
         $package->application_cost_per_auction = $collection['appication_cost_per_inquiry'];
         $package->sms_cost_per_auction = $collection['sms_cost_per_inquiry'];
         $package->watchlist = $collection['watchlist'];
         $package->save_inquiry = $collection['save_inquiry'];
         $package->supplier_vendor_suggestion = $collection['supplier_vendor_suggestion'];
         $package->consultation = $collection['consultation'];
         $package->package_description = $collection['package_description'];

         $package->save();
         return $package;
     } catch (QueryException $exception) {
         throw new InvalidArgumentException($exception->getMessage());
     }
 }
 public function StatusBuyerPackage($id)
 {
     $banner = Package::findOrFail($id);
     $status = $banner->status == 1 ? 0 : 1;
     $banner->status = $status;
     $banner->save();
     return $banner;
 }
 public function GetBuyerPackageById($id)
 {
     return Package::findOrFail($id);
 }
 public function updateBuyerPackage(array $data)
 {
     try {
         $collection = collect($data);
         $package = Package::findOrFail($collection['id']);
         $package->package_name = $collection['package_name'];
         $package->rupees_prefix = $collection['rupees_prefix'];
         $package->package_price = $collection['package_price'];
         $package->package_type = $collection['package_type'];
         $package->package_duration = $collection['package_duration'];
         $package->inquiry_auction = 0;
         $package->total_number_of_auction = $collection['total_number_of_auction'];
         $package->total_cost_per_auction = $collection['total_cost_per_inquiry'];
         $package->application_cost_per_auction = $collection['appication_cost_per_inquiry'];
         $package->sms_cost_per_auction = $collection['sms_cost_per_inquiry'];
         $package->watchlist = $collection['watchlist'];
         $package->save_inquiry = $collection['save_inquiry'];
         $package->supplier_vendor_suggestion = $collection['supplier_vendor_suggestion'];
         $package->consultation = $collection['consultation'];
         $package->package_description = $collection['package_description'];
         $package->save();
         if($package){
            $websiteLog =new WebsiteLogs();
            $websiteLog->emp_id = Auth::guard('admin')->user()->id;
            $websiteLog->logs_type ="UPDATED";
            $websiteLog->table_name ="packages";
            $websiteLog->response =json_encode($package);
            $websiteLog->save();
        }
         return $package;
     } catch (QueryException $exception) {
         throw new InvalidArgumentException($exception->getMessage());
     }
 }
 public function DeleteBuyerPackage($id)
 {
     $delete = Package::findOrFail($id);
     $delete->deleted_at=0;
     $delete->save();
     if($delete){
        if($delete){
            $websiteLog =new WebsiteLogs();
            $websiteLog->emp_id = Auth::guard('admin')->user()->id;
            $websiteLog->logs_type ="DELETED";
            $websiteLog->table_name ="packages";
            $websiteLog->response =json_encode($delete);
            $websiteLog->save();
        }
     }
     return $delete;
 }



 //seller
 public function getAllSellerPackages()
 {
     return SellerPackage::latest()->where('deleted_at', 1)->paginate(20);
 }
 public function CreateSellerPackage(array $data)
 {

     try {
         $package = new SellerPackage();
         $collection = collect($data);
         $package->package_name = $collection['package_name'];
         $package->package_type = $collection['package_type'];
         $package->package_duration = $collection['package_duration'];
         $package->rupees_prefix = $collection['rupees_prefix'];
         $package->package_price = $collection['package_price'];
         $package->credit = $collection['credit'];
         $package->bid = $collection['bid'];
         $package->badge = $collection['badge'];
         $package->group_watchlist_addition = $collection['group_watchlist_addition'];
         $package->consultation = $collection['consultation'];
         $package->package_description = $collection['package_description'];

         $package->save();
         return $package;
     } catch (QueryException $exception) {
         throw new InvalidArgumentException($exception->getMessage());
     }
 }
 public function StatusSellerPackage($id)
 {
     $banner = SellerPackage::findOrFail($id);
     $status = $banner->status == 1 ? 0 : 1;
     $banner->status = $status;
     $banner->save();
     return $banner;
 }
 public function GetSellerPackageById($id)
 {
     return SellerPackage::findOrFail($id);
 }
 public function updateSellerPackage(array $data)
 {
    
     try {
         $collection = collect($data);
         $package = SellerPackage::findOrFail($collection['id']);
         $package->package_name = $collection['package_name'];
         $package->package_type = $collection['package_type'];
         $package->package_duration = $collection['package_duration'];
         $package->rupees_prefix = $collection['rupees_prefix'];
         $package->package_price = $collection['package_price'];
         $package->credit = $collection['credit'];
         $package->bid = $collection['bid'];
         $package->badge = $collection['badge'];
         $package->group_watchlist_addition = $collection['group_watchlist_addition'];
         $package->consultation = $collection['consultation'];
         $package->package_description = $collection['package_description'];
         $package->save();
         if($package){
            $websiteLog =new WebsiteLogs();
            $websiteLog->logs_type ="UPDATED";
            $websiteLog->table_name ="seller_packages";
            $websiteLog->response =json_encode($package);
            $websiteLog->save();
        }
         return $package;
     } catch (QueryException $exception) {
         throw new InvalidArgumentException($exception->getMessage());
     }
 }
 public function DeleteSellerPackage($id)
 {
     $delete = SellerPackage::findOrFail($id);
     $delete->deleted_at=0;
     $delete->save();
     if($delete){
        $websiteLog =new WebsiteLogs();
        $websiteLog->emp_id = Auth::guard('admin')->user()->id;
        $websiteLog->logs_type ="DELETED";
        $websiteLog->table_name ="seller_packages";
        $websiteLog->response =json_encode($delete);
        $websiteLog->save();
     }
     return $delete;
 }


}