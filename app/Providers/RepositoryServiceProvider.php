<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\VendorRepository;
use App\Contracts\VendorContract;

use App\Repositories\BuyerDashboardRepository;
use App\Contracts\BuyerDashboardContract;

use App\Repositories\SellerDashboardRepository;
use App\Contracts\SellerDashboardContract;

use App\Repositories\UserRepository;
use App\Contracts\UserContract;

use App\Repositories\JobRepository;
use App\Contracts\JobContract;

use App\Repositories\MasterRepository;
use App\Contracts\MasterContract;

use App\Repositories\BlogRepository;
use App\Contracts\BlogContract;

use App\Repositories\PackageRepository;
use App\Contracts\PackageContract;

use App\Repositories\UserDetailsRepository;
use App\Contracts\UserDetailsContract;

use App\Repositories\PaymentManageMentRepository;
use App\Contracts\PaymentManageMentContract;

use App\Repositories\AdminInquiryRepository;
use App\Contracts\AdminInquiryContract;

use App\Repositories\ClientRepository;
use App\Contracts\ClientContract;
use App\Repositories\EmployeeDetailsRepository;
use App\Contracts\EmployeeDetailsContract;
use App\Models\Package;

class RepositoryServiceProvider extends ServiceProvider{
    protected $repositories = [
        VendorContract::class  =>  VendorRepository::class,
        BuyerDashboardContract::class  =>  BuyerDashboardRepository::class,
        SellerDashboardContract::class  =>  SellerDashboardRepository::class,
        UserContract::class  =>  UserRepository::class,
        JobContract::class  =>  JobRepository::class,
        ClientContract::class  =>  ClientRepository::class,
        MasterContract::class  =>  MasterRepository::class,
        BlogContract::class  =>  BlogRepository::class,
        PackageContract::class  =>  PackageRepository::class,
        UserDetailsContract::class  =>  UserDetailsRepository::class,
        EmployeeDetailsContract::class  =>  EmployeeDetailsRepository::class,
        PaymentManageMentContract::class  =>  PaymentManageMentRepository::class,
        AdminInquiryContract::class  =>  AdminInquiryRepository::class,
    ];
    
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
