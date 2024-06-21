<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{RegisteredUserController};
use App\Http\Controllers\AdminAuth\{LoginController};
use App\Http\Controllers\User\{UserController, AuctionGenerationController, BuyerDashboardController};
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\{AdminController, VendorController, InspectorController, ClientController,MasterModuleController,BlogController,PackageController,UserDetailsController,WebsiteSettingController,EmployeeDetailsController};
use App\Http\Controllers\HomeController;

//employee
Route::group(['middleware' => 'client', 'prefix' => 'employee'], function () {
    Route::get('/dashboard', [AdminController::class, 'EmployeeDashboard'])->name('employee.dashboard');
        Route::group(['prefix'  =>   'master'], function() {
            //attandance
            Route::group(['prefix'  =>   'attandance'], function() {
                Route::get('', [MasterModuleController::class, 'AttandanceIndex'])->name('employee.attandance.index');
            });
            Route::group(['prefix'  =>   'sellers'], function() {
                Route::get('', [MasterModuleController::class, 'SellersIndex'])->name('employee.sellers.index');
                Route::get('/create', [MasterModuleController::class, 'SellersCreate'])->name('employee.sellers.create');
                Route::post('/store', [MasterModuleController::class, 'SellersStore'])->name('employee.sellers.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'SellersEdit'])->name('employee.sellers.edit');
                Route::post('/update', [MasterModuleController::class, 'SellersUpdate'])->name('employee.sellers.update');
                Route::get('/employee-user-buyer-activity/{id}', [MasterModuleController::class, 'EmployeeShowBuyerActivity'])->name('show.user.buyer.activity');
                Route::get('/employee-buyer-inquiry-view/{id}', [MasterModuleController::class, 'EmployeeViewBuyerInquiry'])->name('employee.buyer.inquiry.view');
                Route::get('/employee-buyer-inquiry-participants-view/{id}', [MasterModuleController::class, 'EmployeeBuyerInquiryParticipantsView'])->name('employee.buyer.inquiry.participants.view');
                Route::get('/employee-user-seller-activity/{id}', [MasterModuleController::class, 'EmployeeShowSellerActivity'])->name('show.user.seller.activity');
            });

        });


});

