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

     //package
     public function PackageIndex()
     {
         $data = $this->packageRepository->getAllPackages();
         return view('admin.package.index', compact('data'));
     }
     public function PackageCreate()
     {
         return view('admin.package.create');
     }
     public function PackageStore(Request $request)
     {
        //  dd($request->all());    
         $request->validate([
             'package_name' => 'required|max:255',
             'package_type' => 'required',
             'package_price' => 'required',
             'package_description' => 'required',
         ]);
         $params = $request->except('_token');
         $data = $this->packageRepository->CreatePackage($params);
         if ($data) {
             return redirect()->route('admin.package.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.package.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function PackageStatus($id)
     {
         $data = $this->packageRepository->StatusPackage($id);
         return redirect()->back();
     }
     public function PackageEdit($id)
     {
         $data = $this->packageRepository->GetPackageById($id);
        //  dd($data);
         return view('admin.package.edit', compact('data'));
     }
     public function PackageUpdate(Request $request)
     {
        //  dd($request->all());
         $request->validate([
            'package_name' => 'required|max:255',
            //  'package_type' => 'required',
             'package_price' => 'required',
             'package_description' => 'required',
 
         ]);
         $params = $request->except('_token');
         $data = $this->packageRepository->updatePackage($params);
         if ($data) {
             return redirect()->route('admin.package.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.package.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function PackageDelete($id)
     {
         $data = $this->packageRepository->DeletePackage($id);
         if ($data) {
             return redirect()->route('admin.package.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.package.index')->with('error', 'Something went wrong please try again!');
         }
     }
}
