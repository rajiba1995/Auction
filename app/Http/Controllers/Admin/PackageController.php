<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\PackageContract;

class PackageController extends Controller
{

    protected $packageRepository;

    public function __construct(PackageContract $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

     //Buyer-package
     public function BuyerPackageIndex()
     {
         $data = $this->packageRepository->getAllBuyerPackages();
         return view('admin.package.index', compact('data'));
     }
     public function BuyerPackageCreate()
     {
         return view('admin.package.create');
     }
     public function BuyerPackageStore(Request $request)
     {
        //  dd($request->all());    
         $request->validate([
             'package_name' => 'required',
             'rupees_prefix' => 'required',
             'package_price' => 'required',
             'package_type' => 'required',
             'package_duration' => 'required',
             'total_number_of_auction' => ['required_if:inquiry_auction,0','numeric'],
             'total_cost_per_inquiry' => 'required|numeric',
             'appication_cost_per_inquiry' => 'required|numeric',
             'sms_cost_per_inquiry' => 'required|numeric', 
             'save_inquiry' => 'required',
             'supplier_vendor_suggestion' => 'required',
             'consultation' => 'required',
             'watchlist' => 'required',
             'package_description' => 'nullable',
         ]);
         $params = $request->except('_token');
         $data = $this->packageRepository->CreateBuyerPackage($params);
         if ($data) {
             return redirect()->route('admin.buyer.package.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.buyer.package.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function BuyerPackageStatus($id)
     {
         $data = $this->packageRepository->StatusBuyerPackage($id);
         return redirect()->back();
     }
     public function BuyerPackageEdit($id)
     {
         $data = $this->packageRepository->GetBuyerPackageById($id);
        //  dd($data);
         return view('admin.package.edit', compact('data'));
     }
     public function BuyerPackageUpdate(Request $request)
     {
        //  dd($request->all());
         $request->validate([
            'package_name' => 'required',
            'rupees_prefix' => 'required',
            'package_price' => 'required',
            'package_type' => 'required',
            'package_duration' => 'required',
            'total_number_of_auction' => ['required_if:inquiry_auction,0','numeric'],
            'total_cost_per_inquiry' => 'required|numeric',
            'appication_cost_per_inquiry' => 'required|numeric',
            'sms_cost_per_inquiry' => 'required|numeric', 
            'save_inquiry' => 'required',
            'supplier_vendor_suggestion' => 'required',
            'consultation' => 'required',
            'watchlist' => 'required',
            'package_description' => 'nullable',
 
         ]);
         $params = $request->except('_token');
         $data = $this->packageRepository->updateBuyerPackage($params);
         if ($data) {
             return redirect()->route('admin.buyer.package.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.buyer.package.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function BuyerPackageDelete($id)
     {
         $data = $this->packageRepository->DeleteBuyerPackage($id);
         if ($data) {
             return redirect()->route('admin.buyer.package.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.buyer.package.index')->with('error', 'Something went wrong please try again!');
         }
     }
     //Seller-package
     public function SellerPackageIndex()
     {
         $data = $this->packageRepository->getAllSellerPackages();
         return view('admin.seller_package.index', compact('data'));
     }
     public function SellerPackageCreate()
     {
         return view('admin.seller_package.create');
     }
     public function SellerPackageStore(Request $request)
     { 
         $request->validate([
             'package_name' => 'required',
             'package_type' => 'required',
             'package_duration' => 'required',
             'rupees_prefix' => 'required',
             'package_price' => 'required',
             'credit' => 'required|numeric',
             'bid' => 'required',
             'badge' => 'required',
             'group_watchlist_addition' => 'required',
             'consultation' => 'required',
             'package_description' => 'nullable',
         ]);
         $params = $request->except('_token');
         $data = $this->packageRepository->CreateSellerPackage($params);
         if ($data) {
             return redirect()->route('admin.seller.package.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.seller.package.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function SellerPackageStatus($id)
     {
         $data = $this->packageRepository->StatusSellerPackage($id);
         return redirect()->back();
     }
     public function SellerPackageEdit($id)
     {
         $data = $this->packageRepository->GetSellerPackageById($id);
        //  dd($data);
         return view('admin.seller_package.edit', compact('data'));
     }
     public function SellerPackageUpdate(Request $request)
     {
        //  dd($request->all());
         $request->validate([
            'package_name' => 'required',
            'package_type' => 'required',
            'package_duration' => 'required',
            'rupees_prefix' => 'required',
            'package_price' => 'required',
            'credit' => 'required|numeric',
            'bid' => 'required',
            'badge' => 'required',
            'group_watchlist_addition' => 'required',
            'consultation' => 'required',
            'package_description' => 'nullable',
 
         ]);
         $params = $request->except('_token');
         $data = $this->packageRepository->updateSellerPackage($params);
         if ($data) {
             return redirect()->route('admin.seller.package.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.seller.package.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function SellerPackageDelete($id)
     {
         $data = $this->packageRepository->DeleteSellerPackage($id);
         if ($data) {
             return redirect()->route('admin.seller.package.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.seller.package.index')->with('error', 'Something went wrong please try again!');
         }
     }
}
