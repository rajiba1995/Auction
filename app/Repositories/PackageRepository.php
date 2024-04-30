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
use App\Models\Package;
use App\Models\SellerPackage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;





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
         $package->package_type = $collection['package_type'];
         $package->package_price = $collection['package_price'];
         $package->package_prefix = $collection['package_prefix'];
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
         $package->package_type = $collection['package_type'];
         $package->package_price = $collection['package_price'];
         $package->package_prefix = $collection['package_prefix'];
         $package->package_description = $collection['package_description'];
         $package->save();
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
         $package->package_price = $collection['package_price'];
         $package->package_prefix = $collection['package_prefix'];
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
         $package->package_price = $collection['package_price'];
         $package->package_prefix = $collection['package_prefix'];
         $package->package_description = $collection['package_description'];
         $package->save();
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
     return $delete;
 }


}