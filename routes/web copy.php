<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{RegisteredUserController};
use App\Http\Controllers\AdminAuth\{LoginController};
use App\Http\Controllers\User\{UserController, AuctionGenerationController};
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\{AdminController, VendorController, InspectorController, ClientController,MasterModuleController,BlogController,PackageController,UserDetailsController,WebsiteSettingController};
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
        Route::group(['prefix'  =>   'my'], function() {
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
            Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
            Route::get('/profile/edit', [UserController::class, 'ProfileEdit'])->name('user.profile.edit');
            Route::post('/profile/update', [UserController::class, 'ProfileUpdate'])->name('user.profile.update');
            Route::get('/product-and-service', [UserController::class, 'ProductAndService'])->name('user.product_and_service');
            Route::get('/collection_wise_category', [UserController::class, 'CollectionWiseCategory'])->name('user.collection_wise_category');
            
            Route::get('/product-and-service/add', [UserController::class, 'ProductAndServiceAdd'])->name('user.product_and_service.add');
            Route::get('/product-and-service/edit/{id}', [UserController::class, 'ProductAndServiceEdit'])->name('user.product_and_service.edit');
            // Product
            Route::post('/product-and-service/store', [UserController::class, 'ProductAndServiceStore'])->name('user.product_and_service.store');
            Route::post('/product-and-service/update', [UserController::class, 'ProductAndServiceUpdate'])->name('user.product_and_service.update');
       
            Route::group(['prefix'  =>   'watchlist'], function() {
                Route::get('', [UserController::class, 'MyWatchlist'])->name('user.watchlist');
                Route::post('/group-watchlist', [UserController::class, 'CreateGroupWatchlist'])->name('user.create.group.watchlist');
                Route::post('/group-watchlist/update', [UserController::class, 'UpdateGroupWatchlist'])->name('user.update.group.watchlist');
                Route::get('/group-watchlist/delete', [UserController::class, 'DeleteGroupWatchlist'])->name('user.delete.group.watchlist');
                Route::post('/store', [UserController::class, 'MyWatchlistDataSore'])->name('user.watchlist.store');
                Route::post('/report/store', [UserController::class, 'UserToSellerReportStore'])->name('user.report.store');
                Route::post('/group-watchlist/store', [UserController::class, 'MyGroupWatchlistDataSore'])->name('user.group.watchlist.store');
                Route::get('/delete/{id}', [UserController::class, 'MyWatchlistDataDelete'])->name('user.watchlist.delete');
                Route::get('/{slug}', [UserController::class, 'my_watchlist_by_group'])->name('user.watchlist.my_watchlist_by_group');
            });
        });

        // Inquiry Generation
        Route::get('/auction-inquiry-generation',[AuctionGenerationController::class,'auction_inquiry_generation'])->name('front.auction_inquiry_generation');
        Route::post('/auction-inquiry-generation/store',[AuctionGenerationController::class,'auction_inquiry_generation_store'])->name('front.auction_inquiry_generation_store');
    });
// Admin login routes
// Route::redirect('/', '/admin/login');
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'adminlogin'])->name('admin.login.check');
Route::get('admin/logout', [LoginController::class, 'adminlogout'])->name('admin.logout');


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::group(['prefix'  =>   'master'], function() {
        // Banner Management
            Route::group(['prefix'  =>   'banner'], function() {
                Route::get('', [MasterModuleController::class, 'BannerIndex'])->name('admin.banner.index');
                Route::get('/create', [MasterModuleController::class, 'BannerCreate'])->name('admin.banner.create');
                Route::post('/store', [MasterModuleController::class, 'BannerStore'])->name('admin.banner.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'BannerEdit'])->name('admin.banner.edit');
                Route::post('/update', [MasterModuleController::class, 'BannerUpdate'])->name('admin.banner.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'BannerDelete'])->name('admin.banner.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'BannerStatus'])->name('admin.banner.status');
                
            });
            // Collection Management
            Route::group(['prefix'  =>   'category'], function() {
                Route::get('', [MasterModuleController::class, 'CollectionIndex'])->name('admin.collection.index');
                // Route::get('/pending-colection', [MasterModuleController::class, 'PendingCollectionIndex'])->name('admin.pending.collection.index');
                Route::get('/create', [MasterModuleController::class, 'CollectionCreate'])->name('admin.collection.create');
                Route::post('/store', [MasterModuleController::class, 'CollectionStore'])->name('admin.collection.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'CollectionEdit'])->name('admin.collection.edit');
                Route::post('/update', [MasterModuleController::class, 'CollectionUpdate'])->name('admin.collection.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'CollectionDelete'])->name('admin.collection.delete');
                Route::get('/status', [MasterModuleController::class, 'CollectionStatus'])->name('admin.collection.status');
                Route::get('/sub-category/{id}', [MasterModuleController::class, 'CollectionToCategory'])->name('admin.collection.category');
                
            });
            // Category Management
            Route::group(['prefix'  =>   'sub-category'], function() {
                Route::get('', [MasterModuleController::class, 'CategoryIndex'])->name('admin.category.index');
                Route::get('/create', [MasterModuleController::class, 'CategoryCreate'])->name('admin.category.create');
                Route::post('/store', [MasterModuleController::class, 'CategoryStore'])->name('admin.category.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'CategoryEdit'])->name('admin.category.edit');
                Route::post('/update', [MasterModuleController::class, 'CategoryUpdate'])->name('admin.category.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'CategoryDelete'])->name('admin.category.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'CategoryStatus'])->name('admin.category.status');
                
            });
            // tutorial Management
            Route::group(['prefix'  =>   'tutorial'], function() {
                Route::get('', [MasterModuleController::class, 'TutorialIndex'])->name('admin.tutorial.index');
                Route::get('/create', [MasterModuleController::class, 'TutorialCreate'])->name('admin.tutorial.create');
                Route::post('/store', [MasterModuleController::class, 'TutorialStore'])->name('admin.tutorial.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'TutorialEdit'])->name('admin.tutorial.edit');
                Route::post('/update', [MasterModuleController::class, 'TutorialUpdate'])->name('admin.tutorial.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'TutorialDelete'])->name('admin.tutorial.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'TutorialStatus'])->name('admin.tutorial.status');
                
            });
            // Client Management
            Route::group(['prefix'  =>   'client'], function() {
                Route::get('', [MasterModuleController::class, 'ClientIndex'])->name('admin.client.index');
                Route::get('/create', [MasterModuleController::class, 'ClientCreate'])->name('admin.client.create');
                Route::post('/store', [MasterModuleController::class, 'ClientStore'])->name('admin.client.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'ClientEdit'])->name('admin.client.edit');
                Route::post('/update', [MasterModuleController::class, 'ClientUpdate'])->name('admin.client.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'ClientDelete'])->name('admin.client.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'ClientStatus'])->name('admin.client.status');
                
            });
            // Feedback Management
            Route::group(['prefix'  =>   'feedback'], function() {
                Route::get('', [MasterModuleController::class, 'FeedbackIndex'])->name('admin.feedback.index');
                Route::get('/create', [MasterModuleController::class, 'FeedbackCreate'])->name('admin.feedback.create');
                Route::post('/store', [MasterModuleController::class, 'FeedbackStore'])->name('admin.feedback.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'FeedbackEdit'])->name('admin.feedback.edit');
                Route::post('/update', [MasterModuleController::class, 'FeedbackUpdate'])->name('admin.feedback.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'FeedbackDelete'])->name('admin.feedback.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'FeedbackStatus'])->name('admin.feedback.status');
                
            });
            // Blogs Management
            Route::group(['prefix'  =>   'blog'], function() {
                Route::get('', [BlogController::class, 'BlogIndex'])->name('admin.blog.index');
                Route::get('/create', [BlogController::class, 'BlogCreate'])->name('admin.blog.create');
                Route::post('/store', [BlogController::class, 'BlogStore'])->name('admin.blog.store');
                Route::get('/edit/{id}', [BlogController::class, 'BlogEdit'])->name('admin.blog.edit');
                Route::post('/update', [BlogController::class, 'BlogUpdate'])->name('admin.blog.update');
                Route::get('/delete/{id}', [BlogController::class, 'BlogDelete'])->name('admin.blog.delete');
                Route::get('/status/{id}', [BlogController::class, 'BlogStatus'])->name('admin.blog.status');
                
            });
            Route::group(['prefix'  =>   'package'], function() {
                Route::get('', [PackageController::class, 'PackageIndex'])->name('admin.package.index');
                Route::get('/create', [PackageController::class, 'PackageCreate'])->name('admin.package.create');
                Route::post('/store', [PackageController::class, 'PackageStore'])->name('admin.package.store');
                Route::get('/edit/{id}', [PackageController::class, 'PackageEdit'])->name('admin.package.edit');
                Route::post('/update', [PackageController::class, 'PackageUpdate'])->name('admin.package.update');
                Route::get('/delete/{id}', [PackageController::class, 'PackageDelete'])->name('admin.package.delete');
                Route::get('/status/{id}', [PackageController::class, 'PackageStatus'])->name('admin.package.status');
                
            });
            // Business Management
            Route::group(['prefix'  =>   'business-type'], function() {
                Route::get('', [MasterModuleController::class, 'BusinessIndex'])->name('admin.business.index');
                Route::get('/create', [MasterModuleController::class, 'BusinessCreate'])->name('admin.business.create');
                Route::post('/store', [MasterModuleController::class, 'BusinessStore'])->name('admin.business.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'BusinessEdit'])->name('admin.business.edit');
                Route::post('/update', [MasterModuleController::class, 'BusinessUpdate'])->name('admin.business.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'BusinessDelete'])->name('admin.business.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'BusinessStatus'])->name('admin.business.status');
        
            });
            // LegalStatus
            Route::group(['prefix'  =>   'legal-status'], function() {
                Route::get('', [MasterModuleController::class, 'LegalStatusIndex'])->name('admin.legalstatus.index');
                Route::get('/create', [MasterModuleController::class, 'LegalStatusCreate'])->name('admin.legalstatus.create');
                Route::post('/store', [MasterModuleController::class, 'LegalStatusStore'])->name('admin.legalstatus.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'LegalStatusEdit'])->name('admin.legalstatus.edit');
                Route::post('/update', [MasterModuleController::class, 'LegalStatusUpdate'])->name('admin.legalstatus.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'LegalStatusDelete'])->name('admin.legalstatus.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'LegalStatusStatus'])->name('admin.legalstatus.status');
        
            });
           
        });
        Route::group(['prefix'  =>   'setting'], function() {

        // Social-media Management
        Route::group(['prefix'  =>   'social-media'], function() {
            Route::get('', [MasterModuleController::class, 'SocialMediaIndex'])->name('admin.social_media.index');
            Route::get('/create', [MasterModuleController::class, 'SocialMediaCreate'])->name('admin.social_media.create');
            Route::post('/store', [MasterModuleController::class, 'SocialMediaStore'])->name('admin.social_media.store');
            Route::get('/edit/{id}', [MasterModuleController::class, 'SocialMediaEdit'])->name('admin.social_media.edit');
            Route::post('/update', [MasterModuleController::class, 'SocialMediaUpdate'])->name('admin.social_media.update');
            Route::get('/delete/{id}', [MasterModuleController::class, 'SocialMediaDelete'])->name('admin.social_media.delete');
            Route::get('/status/{id}', [MasterModuleController::class, 'SocialMediaStatus'])->name('admin.social_media.status');
            
        });
        Route::group(['prefix'  =>   'website-settings'], function() {
            Route::get('', [WebsiteSettingController::class, 'WebsiteSittengIndex'])->name('admin.website-settings.index');
            Route::post('/update', [WebsiteSettingController::class, 'WebsiteSittengUpdate'])->name('admin.website-settings.update');
        });
    });
         //user details
 Route::group(['prefix'  =>   'user'], function() {
    Route::get('', [UserDetailsController::class, 'UserDetailsIndex'])->name('admin.user.index');
    Route::get('/view/{id}', [UserDetailsController::class, 'UserDetailsView'])->name('admin.user.view');
    Route::get('/document/view/{id}', [UserDetailsController::class, 'UserDocumentView'])->name('admin.user.document.view');
    Route::get('/report/view/{id}', [UserDetailsController::class, 'UserReportView'])->name('admin.user.report');
    Route::get('/report/status/{id}', [UserDetailsController::class, 'UserReportStatus'])->name('admin.user.report.status');
    Route::get('/document/status', [UserDetailsController::class, 'UserDocumentStatus'])->name('admin.user.document.status');
});
         //WebSite Settings
 
});



// User Module
Route::get('/user/make_slug', [HomeController::class, 'UserGlobalMakeSlug'])->name('user.global.make_slug');
Route::get('/{location}/{keyword}', [HomeController::class, 'UserGlobalFilter'])->name('user.global.filter');
Route::get('/profile/{location}/{keyword}', [HomeController::class, 'UserProfileFetch'])->name('user.profile.fetch');
Route::get('/photos-and-documents/{location}/{keyword}', [HomeController::class, 'UserPhotoAndDocument'])->name('user.profile.photos_and_documents');
Route::get('/product-and-service/{location}/{keyword}', [HomeController::class, 'UserProductService'])->name('user.profile.product_and_service');

Auth::routes();