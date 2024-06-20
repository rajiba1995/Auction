<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{RegisteredUserController};
use App\Http\Controllers\AdminAuth\{LoginController};
use App\Http\Controllers\User\{UserController, AuctionGenerationController, BuyerDashboardController,SellerDashboardController};
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\{AdminController, VendorController, InspectorController, ClientController,MasterModuleController,BlogController,PackageController,UserDetailsController,WebsiteSettingController,EmployeeDetailsController};
use App\Http\Controllers\CornController;
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
    Route::get('/terms-conditions',[HomeController::class,'TermsConditions'])->name('terms_conditions');
    Route::get('/privacy-policy',[HomeController::class,'PrivacyPolicy'])->name('privacy_policy');
    // corn Controller
    Route::prefix('cron')->group(function () {
        Route::get('/seller-monthly-package-check',[CornController::class,'SellerMothlyPackageCheckCron'])->name('seller_monthly_package_chcek_cron');
        Route::get('/seller-expiry-package-check',[CornController::class,'SellerExpiryPackageCheckCron'])->name('seller_expiry_package_chcek_cron');
        Route::get('/buyer-package-current-unit-check',[CornController::class,'BuyerPackageCurrentUnitCheckCron'])->name('buyer_package_current_unit_chcek_cron');
        Route::get('/buyer-expiry-package-check',[CornController::class,'BuyerExpiryPackageCheckCron'])->name('buyer_expiry_package_chcek_cron');
    });   

    Route::group(['middleware' => ['auth', 'check.user.profile']], function () {
        Route::prefix('my')->group(function () {
     
            Route::get('/mail', [UserController::class, 'mail'])->name('user.mail');        
            Route::get('/rating-and-reviews', [UserController::class, 'RatingAndReview'])->name('user.rating_and_reviews');        
            Route::post('/rating-and-reviews/comment', [UserController::class, 'RatingAndReviewComment'])->name('user.rating_and_reviews.comment');        
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
            Route::get('/wallet-management', [UserController::class, 'wallet_management'])->name('user.wallet_management');//wallet
            Route::post('/package/payment-management', [UserController::class, 'package_payment_management'])->name('user.package_payment_management');
            Route::post('buyer/package/store', [UserController::class, 'buyer_package_store'])->name('user.buyer_package_store');
            Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
            Route::get('/change-password', [UserController::class, 'changePassword'])->name('user.change_password');
            Route::post('/change-password', [UserController::class, 'changePasswordUpdate'])->name('user.change_password_update');
            Route::get('/transaction', [UserController::class, 'transaction'])->name('user.transaction');
            Route::get('/notifications', [UserController::class, 'notifications'])->name('user.notifications');
            Route::get('/seller-wallet-transaction', [UserController::class, 'seller_wallet_transaction'])->name('user.seller_wallet_transaction');
            Route::get('/buyer-wallet-transaction', [UserController::class, 'buyer_wallet_transaction'])->name('user.buyer_wallet_transaction');
            Route::get('/seller-package-history', [UserController::class, 'seller_package_history'])->name('user.seller_package_history');
            Route::get('/buyer-package-history', [UserController::class, 'buyer_package_history'])->name('user.buyer_package_history');
            Route::post('/transaction/purchase', [UserController::class, 'purchase'])->name('user.purchase.transaction');
            Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
            // Route::get('/profile/edit', [UserController::class, 'ProfileEdit'])->name('user.profile.edit');
            Route::get('/state_wise_city', [UserController::class, 'StateWiseCity'])->name('user.state_wise_city');
            // Route::post('/profile/update', [UserController::class, 'ProfileUpdate'])->name('user.profile.update');
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
                Route::post('/invite_outside_participants', [UserController::class, 'InviteOutSideParticipants'])->name('user.invite_outside_participants.store');
                Route::get('/outside_participants/delete', [UserController::class, 'OutSideParticipantsDelete'])->name('user.outside_participant.delete');
                Route::get('/exsisting_outside_participants/delete', [UserController::class, 'ExsistingOutSideParticipantsDelete'])->name('user.exsists_outside_participant.delete');
            });
        });
    
        // Inquiry Generation
        Route::get('/auction-inquiry-generation', [AuctionGenerationController::class, 'auction_inquiry_generation'])->name('front.auction_inquiry_generation');
        Route::post('/auction-inquiry-generation/store', [AuctionGenerationController::class, 'auction_inquiry_generation_store'])->name('front.auction_inquiry_generation_store');
        Route::get('/auction-inquiry-generation/participants/delete', [AuctionGenerationController::class, 'auction_participants_delete'])->name('front.auction_participants_delete');
        Route::post('/restart-inquiry/strore', [AuctionGenerationController::class, 'auction_inquiry_restart'])->name('front.auction_inquiry_restart');

        // Buyer Dashboard
        Route::group(['prefix'  =>   'buyer'], function() {
            Route::get('/groups', [BuyerDashboardController::class, 'index'])->name('user_buyer_dashboard');
            Route::get('/saved-inquiries', [BuyerDashboardController::class, 'saved_inquiries'])->name('buyer_saved_inquiries');
            Route::get('/live-inquiries', [BuyerDashboardController::class, 'live_inquiries'])->name('buyer_live_inquiries');
            Route::get('/pending-inquiries', [BuyerDashboardController::class, 'pending_inquiries'])->name('buyer_pending_inquiries');
            Route::get('/confirmed-inquiries', [BuyerDashboardController::class, 'confirmed_inquiries'])->name('buyer_confirmed_inquiries');
            Route::get('/inquiry-pdf/{id}', [BuyerDashboardController::class, 'InquiryPdfGenarate'])->name('buyer.inquiry.pdf');
            Route::get('/cancelled-inquiries', [BuyerDashboardController::class, 'cancelled_inquiries'])->name('buyer_cancelled_inquiries');
            Route::post('/cancelled-reason', [BuyerDashboardController::class, 'cancelled_reason'])->name('buyer_cancelled_reason');
            Route::get('/live-inquiries-fetch-ajax', [BuyerDashboardController::class, 'live_inquiries_fetch_ajax'])->name('buyer_live_inquiries_by_ajax');
            Route::post('/live-inquiry-seller-allot', [BuyerDashboardController::class, 'live_inquiry_seller_allot'])->name('live_inquiry_seller_allot');
        });
        // Seller Dashboard
            Route::get('seller/groups', [SellerDashboardController::class, 'index'])->name('user_seller_dashboard');
            Route::post('seller/set-session-and-redirect', [SellerDashboardController::class, 'setSessionAndRedirect']);
            Route::group(['prefix' => 'seller'], function() {
                // Route::group(['middleware' => 'checkActiveSellerPackage'], function() {
                    Route::get('/all-inquiries', [SellerDashboardController::class, 'all_inquiries'])->name('seller_all_inquiries');
                    Route::get('/live-inquiries', [SellerDashboardController::class, 'live_inquiries'])->name('seller_live_inquiries');
                    Route::post('/start-quotes', [SellerDashboardController::class, 'seller_start_quotes'])->name('seller_start_quotes');
                    Route::get('/live-inquiries-fetch-ajax', [SellerDashboardController::class, 'live_inquiries_fetch_ajax'])->name('seller_live_inquiries_by_ajax');
                    Route::post('/new-quote-now', [SellerDashboardController::class, 'new_quote_now'])->name('seller_new_quote_now');
                    Route::post('/seller-new-comment', [SellerDashboardController::class, 'seller_new_comment'])->name('seller_new_comment');
                    Route::post('/seller-send-new-file', [SellerDashboardController::class, 'seller_send_new_file'])->name('seller_send_new_file');
                    Route::post('/seller-send-new-bill', [SellerDashboardController::class, 'seller_send_new_bill'])->name('seller_send_new_bill');
                // });

                Route::get('/pending-inquiries', [SellerDashboardController::class, 'pending_inquiries'])->name('seller_pending_inquiries');
                Route::get('/confirmed-inquiries', [SellerDashboardController::class, 'confirmed_inquiries'])->name('seller_confirmed_inquiries');
                Route::get('/history-inquiries', [SellerDashboardController::class, 'history_inquiries'])->name('seller_history_inquiries');
                Route::post('/cancelled-reason', [SellerDashboardController::class, 'cancelled_reason'])->name('seller_cancelled_inquiry');
                Route::post('/after-confirm-seller-cancelled-reason', [SellerDashboardController::class, 'after_confirm_seller_cancelled_reason'])->name('after_confirm_seller_cancelled_inquiry');
                
            });
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::prefix('my')->group(function () {
            Route::get('/profile/edit', [UserController::class, 'ProfileEdit'])->name('user.profile.edit');
            Route::post('/profile/update', [UserController::class, 'ProfileUpdate'])->name('user.profile.update');
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

Auth::routes();

// Search User Module
Route::get('/user/suggestion', [HomeController::class, 'Suggestion'])->name('user.suggestion');
Route::get('/user/make_slug', [HomeController::class, 'UserGlobalMakeSlug'])->name('user.global.make_slug');
Route::get('/user/make_slug/add_participant', [HomeController::class, 'UserGlobalMakeSlugParticipant'])->name('user.global.make_slug.participant');
Route::get('/profile/{location}/{keyword}', [HomeController::class, 'UserProfileFetch'])->name('user.profile.fetch');
Route::get('/rating-and-reviews/{location}/{keyword}', [HomeController::class, 'UserReviewAndRating'])->name('user.profile.review_and_rating');
Route::get('/rating-and-reviews/write/{location}/{keyword}', [HomeController::class, 'UserReviewAndRatingWrite'])->name('user.profile.review_and_rating.write');
Route::post('/rating-and-reviews/write/submit', [HomeController::class, 'UserReviewAndRatingWriteSubmit'])->name('user.profile.review_and_rating.submit');
Route::get('/photos-and-documents/{location}/{keyword}', [HomeController::class, 'UserPhotoAndDocument'])->name('user.profile.photos_and_documents');
Route::get('/product-and-service/{location}/{keyword}', [HomeController::class, 'UserProductService'])->name('user.profile.product_and_service');
Route::get('/requirements-and-consumption/{location}/{keyword}', [HomeController::class, 'RequirementsAndConsumption'])->name('user.profile.requirements_and_consumption');

Route::get('/{location}/{keyword}', [HomeController::class, 'UserGlobalFilter'])->name('user.global.filter');
Route::get('/{location}/{keyword}/{category}/{subcategory}', [HomeController::class, 'UserGlobalFilterAddParticipant'])->name('user.global.filter.add_participant');
