<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{RegisteredUserController};
use App\Http\Controllers\AdminAuth\{LoginController};
use App\Http\Controllers\User\{UserController, AuctionGenerationController, BuyerDashboardController};
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\{AdminController, VendorController, InspectorController, ClientController,MasterModuleController,BlogController,PackageController,UserDetailsController,WebsiteSettingController,EmployeeDetailsController};
use App\Http\Controllers\HomeController;
require __DIR__.'/auth.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Artisan;
Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return "Cache cleared successfully!";
});

    Route::get('/',[HomeController::class,'index'])->name('front.index');
    Route::post('/register-check',[RegisteredUserController::class,'RegisterCheck'])->name('register-check');
    Route::get('/verify',[RegisteredUserController::class,'UserVerifyData'])->name('front.otp_validation');
    Route::get('/verify/check',[RegisteredUserController::class,'UserVerifyDataCheck'])->name('front.otp_validation.check');


    Route::group(['middleware' => 'auth'], function () {
        Route::prefix('my')->group(function () {
            Route::get('/rating-and-reviews', [UserController::class, 'RatingAndReview'])->name('user.rating_and_reviews');
            
            Route::get('/requirements-and-consumption', [UserController::class, 'RConsumption'])->name('user.requirements_and_consumption');
            Route::get('/requirements-and-consumption/add', [UserController::class, 'RConsumptionAdd'])->name('user.requirements_and_consumption.add');
            Route::post('/requirements-and-consumption/store', [UserController::class, 'RConsumptionStore'])->name('user.requirements_and_consumption.store');
            Route::get('/requirements-and-consumption/delete/{id}', [UserController::class, 'RConsumptionDelete'])->name('user.requirements_and_consumption.delete');
            
            Route::get('/performance-analytics', [UserController::class, 'performance_analytics'])->name('user.performance_analytics');
            
            Route::get('/photos-and-documents', [UserController::class, 'photos_and_documents'])->name('user.photos_and_documents');
            Route::get('/photos-and-documents/edit', [UserController::class, 'photos_and_documents_edit'])->name('user.photos_and_documents_edit');
            Route::get('/photos-and-documents/delete', [UserController::class, 'photos_and_documents_delete'])->name('user.photos_and_documents_delete');
            Route::post('/photos-and-documents/update', [UserController::class, 'photos_and_documents_update'])->name('user.photos_and_documents_update');
            
            Route::get('/payment-management', [UserController::class, 'payment_management'])->name('user.payment_management');
            Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
            Route::get('/transaction', [UserController::class, 'transaction'])->name('user.transaction');
            Route::post('/transaction/purchase', [UserController::class, 'purchase'])->name('user.purchase.transaction');
            Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
            Route::get('/profile/edit', [UserController::class, 'ProfileEdit'])->name('user.profile.edit');
            Route::post('/profile/update', [UserController::class, 'ProfileUpdate'])->name('user.profile.update');
            Route::get('/product-and-service', [UserController::class, 'ProductAndService'])->name('user.product_and_service');
            Route::get('/collection_wise_category', [UserController::class, 'CollectionWiseCategory'])->name('user.collection_wise_category');
            Route::get('/collection_wise_category_by_title', [UserController::class, 'CollectionWiseCategoryBytitle'])->name('user.collection_wise_category_by_title');
            
            Route::get('/product-and-service/add', [UserController::class, 'ProductAndServiceAdd'])->name('user.product_and_service.add');
            Route::get('/product-and-service/edit/{id}', [UserController::class, 'ProductAndServiceEdit'])->name('user.product_and_service.edit');
            // Product
            Route::post('/product-and-service/store', [UserController::class, 'ProductAndServiceStore'])->name('user.product_and_service.store');
            Route::post('/product-and-service/update', [UserController::class, 'ProductAndServiceUpdate'])->name('user.product_and_service.update');
       
    
            Route::prefix('watchlist')->group(function () {
                Route::get('', [UserController::class, 'MyWatchlist'])->name('user.watchlist');
                Route::get('seller_buk_upload_on_group_watchlist', [UserController::class, 'seller_buk_upload_on_group_watchlist'])->name('user.seller_buk_upload_on_group_watchlist');
                Route::post('/group-watchlist', [UserController::class, 'CreateGroupWatchlist'])->name('user.create.group.watchlist');
                Route::post('/group-watchlist/update', [UserController::class, 'UpdateGroupWatchlist'])->name('user.update.group.watchlist');
                Route::get('/group-watchlist/delete', [UserController::class, 'DeleteGroupWatchlist'])->name('user.delete.group.watchlist');
                Route::post('/store', [UserController::class, 'MyWatchlistDataSore'])->name('user.watchlist.store');
                Route::post('/report/store', [UserController::class, 'UserToSellerReportStore'])->name('user.report.store');
                Route::post('/group-watchlist/store', [UserController::class, 'MyGroupWatchlistDataSore'])->name('user.group.watchlist.store');
                Route::get('/delete/{id}', [UserController::class, 'myWatchlistDataDelete'])->name('user.watchlist.delete');
                Route::get('/single_watchlist/delete', [UserController::class, 'DeleteSingleWatchlist'])->name('user.single_watchlist.delete');
                Route::get('/{slug}', [UserController::class, 'my_watchlist_by_group'])->name('user.watchlist.my_watchlist_by_group');
            });
        });
    
        // Inquiry Generation
        Route::get('/auction-inquiry-generation', [AuctionGenerationController::class, 'auction_inquiry_generation'])->name('front.auction_inquiry_generation');
        Route::post('/auction-inquiry-generation/store', [AuctionGenerationController::class, 'auction_inquiry_generation_store'])->name('front.auction_inquiry_generation_store');
        Route::get('/auction-inquiry-generation/participants/delete', [AuctionGenerationController::class, 'auction_participants_delete'])->name('front.auction_participants_delete');

        // Buyer Dashboard
        Route::group(['prefix'  =>   'buyer'], function() {
            Route::get('/groups', [BuyerDashboardController::class, 'index'])->name('user_buyer_dashboard');
            Route::get('/saved-inquiries', [BuyerDashboardController::class, 'saved_inquiries'])->name('buyer_saved_inquiries');
        });
    });
// Admin login routes
// Route::redirect('/', '/admin/login');
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'adminlogin'])->name('admin.login.check');
Route::get('admin/logout', [LoginController::class, 'adminlogout'])->name('admin.logout');

//Employee login  routes
// Route::redirect('/', '/employee/login');
Route::get('employee/login', [LoginController::class, 'showEmployeeLoginForm'])->name('employee.login');
Route::post('employee/login', [LoginController::class, 'employeelogin'])->name('employee.login.check');
Route::get('employee/logout', [LoginController::class, 'employeelogout'])->name('employee.logout');
Route::get('employee/attendance/login', [LoginController::class, 'employeeAttendanceLogin'])->name('employee.attendance.login');
Route::get('employee/attendance/logout', [LoginController::class, 'employeeAttendanceLogout'])->name('employee.attendance.logout');





require 'employee.php';
require 'admin.php';

// User Module
Route::get('/user/make_slug', [HomeController::class, 'UserGlobalMakeSlug'])->name('user.global.make_slug');
Route::get('/{location}/{keyword}', [HomeController::class, 'UserGlobalFilter'])->name('user.global.filter');
Route::get('/profile/{location}/{keyword}', [HomeController::class, 'UserProfileFetch'])->name('user.profile.fetch');
Route::get('/photos-and-documents/{location}/{keyword}', [HomeController::class, 'UserPhotoAndDocument'])->name('user.profile.photos_and_documents');
Route::get('/product-and-service/{location}/{keyword}', [HomeController::class, 'UserProductService'])->name('user.profile.product_and_service');

Auth::routes();