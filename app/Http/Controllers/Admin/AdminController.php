<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\VendorContract;
use App\Contracts\UserContract;
use App\Contracts\JobContract;
use Auth;

class AdminController extends Controller{

    protected $vendorRepository;
    protected $userRepository;
    protected $JobRepository;

    public function __construct(UserContract $userRepository, JobContract $JobRepository, VendorContract $vendorRepository) {
        $this->userRepository = $userRepository;
        $this->JobRepository = $JobRepository;
        $this->vendorRepository = $vendorRepository;
    }

    public function dashboard(){
        $AllVendor = $this->vendorRepository->getAllVendors();
        $AllInspector = $this->userRepository->getAllInspector();
        $AllJobs = $this->JobRepository->getAllJobs();
        $loggedInAdmin = null;
        if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->type == 1) {
            $loggedInAdmin = Auth::guard('admin')->user();
            // dd($loggedInEmployee);
        }
        return view('admin.dashboard', compact('AllVendor', 'AllInspector', 'AllJobs', 'loggedInAdmin'));
        
    }

    public function adminProfile(){
        $admin=Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function adminEdit(){
        $admin=Auth::guard('admin')->user();
        return view('admin.edit', compact('admin'));
    }
    public function adminUpdate(Request $request){
        // dd($request->all());
        request()->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric', 'regex:/^[0-9]{10}$/','unique:admins,phone,'.$request->id],
            'email'=>['required', 'string','unique:admins,email,'.$request->id],
            'pass'=>['nullable','min:6', 'max:12']
        ], [
            'name.required' => 'The name must be required.',
            'phone.required' => 'The phone number must be required.',
            'phone.numeric' => 'The phone number must be numeric.',
            'phone.regex' => 'The phone number must be 10 digit.',
            'email.required' => 'The email must be required.',
            'email.unique' => 'The email has been already taken.',
            'pass.min' => 'The password must be at least :min characters.',
            'pass.max' => 'The password may not be greater than :max characters.',
        ]);
        $admin = Admin::findOrFail($request->id);
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        // $admin->password = $request->pass;
        if ($request->has('pass')) {
            $admin->password = Hash::make($request->pass);
        }

        // Save the updated admin
         $update = $admin->save();

         if ($update) {
            return redirect()->route('admin.dashboard')->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.edit')->with('error', 'Something went wrong please try again!');
        }
        return view('admin.edit', compact('admin'));
    }
    public function EmployeeDashboard(){
        $AllVendor = $this->vendorRepository->getAllVendors();
        $AllInspector = $this->userRepository->getAllInspector();
        $AllJobs = $this->JobRepository->getAllJobs();
        $loggedInEmployee = null;
        if(Auth::guard('client')->check() && Auth::guard('client')->user()->type == 2) {
            $loggedInEmployee = Auth::guard('client')->user();
        }

        return view('employee.dashboard', compact('AllVendor', 'AllInspector', 'AllJobs','loggedInEmployee'));  
    }
    public function clientdashboard(){
        $AllJobs = $this->JobRepository->getAllJobsByClient();
        return view('client.dashboard', compact('AllJobs'));
    }
    public function ClientNotification(){
        $notifications = $this->userRepository->ClientNotificationData();
        return view('client.notification', compact('notifications'));
    }
}
