<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\VendorContract;
use App\Contracts\UserContract;
use App\Contracts\JobContract;

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
        return view('admin.dashboard', compact('AllVendor', 'AllInspector', 'AllJobs'));
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
