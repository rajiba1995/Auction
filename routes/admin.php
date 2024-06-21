<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{RegisteredUserController};
use App\Http\Controllers\AdminAuth\{LoginController};
use App\Http\Controllers\User\{UserController, AuctionGenerationController, BuyerDashboardController};
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\{AdminController, VendorController, InspectorController, ClientController,MasterModuleController,BlogController,PackageController,UserDetailsController,WebsiteSettingController,EmployeeDetailsController,PaymentManageMentController,AdminInquiryController};
use App\Http\Controllers\HomeController;

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/edit', [AdminController::class, 'adminEdit'])->name('admin.edit');
    Route::post('/edit', [AdminController::class, 'adminUpdate'])->name('admin.update');

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
        //buyer-package
        Route::group(['prefix'  =>   'buyer-package'], function() {
            Route::get('', [PackageController::class, 'BuyerPackageIndex'])->name('admin.buyer.package.index');
            Route::get('/create', [PackageController::class, 'BuyerPackageCreate'])->name('admin.buyer.package.create');
            Route::post('/store', [PackageController::class, 'BuyerPackageStore'])->name('admin.buyer.package.store');
            Route::get('/edit/{id}', [PackageController::class, 'BuyerPackageEdit'])->name('admin.buyer.package.edit');
            Route::post('/update', [PackageController::class, 'BuyerPackageUpdate'])->name('admin.buyer.package.update');
            Route::get('/delete/{id}', [PackageController::class, 'BuyerPackageDelete'])->name('admin.buyer.package.delete');
            Route::get('/status/{id}', [PackageController::class, 'BuyerPackageStatus'])->name('admin.buyer.package.status');
            
        });
        //buyer-package
        Route::group(['prefix'  =>   'seller-package'], function() {
            Route::get('', [PackageController::class, 'SellerPackageIndex'])->name('admin.seller.package.index');
            Route::get('/create', [PackageController::class, 'SellerPackageCreate'])->name('admin.seller.package.create');
            Route::post('/store', [PackageController::class, 'SellerPackageStore'])->name('admin.seller.package.store');
            Route::get('/edit/{id}', [PackageController::class, 'SellerPackageEdit'])->name('admin.seller.package.edit');
            Route::post('/update', [PackageController::class, 'SellerPackageUpdate'])->name('admin.seller.package.update');
            Route::get('/delete/{id}', [PackageController::class, 'SellerPackageDelete'])->name('admin.seller.package.delete');
            Route::get('/status/{id}', [PackageController::class, 'SellerPackageStatus'])->name('admin.seller.package.status');
            
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
        Route::get('/add-by-employee', [UserDetailsController::class, 'UserAddByEmployee'])->name('admin.user.add.by.employee');
        Route::get('/view/{id}', [UserDetailsController::class, 'UserDetailsView'])->name('admin.user.view');
        Route::get('/package/{id}', [UserDetailsController::class, 'UserPackageDetailsView'])->name('admin.user.package.view');
        Route::get('/document/view/{id}', [UserDetailsController::class, 'UserDocumentView'])->name('admin.user.document.view');
        Route::get('/transaction/view/{id}', [UserDetailsController::class, 'UserTransactionView'])->name('admin.user.transaction.view');
        Route::get('/wallet/view/{id}', [UserDetailsController::class, 'UserWalletView'])->name('admin.user.wallet.view');
        Route::get('/report/view/{id}', [UserDetailsController::class, 'UserReportView'])->name('admin.user.report');
        Route::get('/report/status/{id}', [UserDetailsController::class, 'UserReportStatus'])->name('admin.user.report.status');
        Route::get('/document/status', [UserDetailsController::class, 'UserDocumentStatus'])->name('admin.user.document.status');
        Route::get('/user/block-status/{id}', [UserDetailsController::class, 'UserBlockStatus'])->name('admin.user.block.status');
        Route::get('/export', [UserDetailsController::class, 'UserDetailsExport'])->name('admin.user.details.export');
        Route::get('/status/{id}', [UserDetailsController::class, 'UserStatus'])->name('admin.user.status');
        Route::post('/gift-buyer-credit', [UserDetailsController::class, 'GiftBuyerCredit'])->name('admin.user.gift.buyer.credit');
        Route::post('/gift-seller-credit', [UserDetailsController::class, 'GiftSellerCredit'])->name('admin.user.gift.seller.credit');
    });
    //employee details
    Route::group(['prefix'  =>   'employee'], function() {
        Route::get('', [EmployeeDetailsController::class, 'EmployeeDetailsIndex'])->name('admin.employee.index');
        Route::get('/sellers/{id}', [EmployeeDetailsController::class, 'SellersIndexThroughEmployee'])->name('admin.employee.sellers');
        Route::get('/attendance/{id}', [EmployeeDetailsController::class, 'AttendanceIndexOfEmployee'])->name('admin.employee.attandance');
        Route::get('/create', [EmployeeDetailsController::class, 'EmployeeCreate'])->name('admin.employee.create');
        Route::post('/store', [EmployeeDetailsController::class, 'EmployeeStore'])->name('admin.employee.store');
        Route::get('/status/{id}', [EmployeeDetailsController::class, 'EmployeeStatus'])->name('admin.employee.status');
        Route::get('/edit/{id}', [EmployeeDetailsController::class, 'EmployeeEdit'])->name('admin.employee.edit');
        Route::post('/update', [EmployeeDetailsController::class, 'EmployeeUpdate'])->name('admin.employee.update');
        Route::get('/delete/{id}', [EmployeeDetailsController::class, 'EmployeeDelete'])->name('admin.employee.delete');
        Route::get('/export', [EmployeeDetailsController::class, 'EmployeeDetailsExport'])->name('admin.employee.details.export');
        Route::post('/user-transfer', [EmployeeDetailsController::class, 'UserTransfer'])->name('admin.employee.user_transfer');
    });
    // Role
    Route::group(['prefix'  =>   'role'], function() {
        Route::get('', [EmployeeDetailsController::class, 'RoleIndex'])->name('admin.role.index');
        Route::get('/create', [EmployeeDetailsController::class, 'RoleCreate'])->name('admin.role.create');
        Route::post('/store', [EmployeeDetailsController::class, 'RoleStore'])->name('admin.role.store');
        Route::get('/edit/{id}', [EmployeeDetailsController::class, 'RoleEdit'])->name('admin.role.edit');
        Route::post('/update', [EmployeeDetailsController::class, 'RoleUpdate'])->name('admin.role.update');
        Route::get('/delete/{id}', [EmployeeDetailsController::class, 'RoleDelete'])->name('admin.role.delete');
        Route::get('/status/{id}', [EmployeeDetailsController::class, 'RoleStatus'])->name('admin.role.status');

    });
    // Location
    Route::group(['prefix'  =>   'location'], function() {
        Route::get('', [MasterModuleController::class, 'LocationStatesIndex'])->name('admin.location.states.index');
        Route::get('/cities/{id}', [MasterModuleController::class, 'LocationCitiesIndex'])->name('admin.location.cities.index');
        Route::get('/city/create/{id}', [MasterModuleController::class, 'LocationCityCreate'])->name('admin.location.city.create');
        Route::post('/city/store', [MasterModuleController::class, 'LocationCityStore'])->name('admin.location.city.store');
        Route::get('/city/edit/{cityId}/{stateId}', [MasterModuleController::class, 'LocationCityEdit'])->name('admin.location.city.edit');
        Route::post('/city/update', [MasterModuleController::class, 'LocationCityUpdate'])->name('admin.location.city.update');
        Route::get('/state/create', [MasterModuleController::class, 'LocationStateCreate'])->name('admin.location.state.create');
        Route::post('/state/store', [MasterModuleController::class, 'LocationStateStore'])->name('admin.location.state.store');
        Route::get('/state/edit/{stateId}/{countryId}', [MasterModuleController::class, 'LocationStateEdit'])->name('admin.location.state.edit');
        Route::post('/state/update', [MasterModuleController::class, 'LocationStateUpdate'])->name('admin.location.state.update');
        // Route::get('/all-cities', [MasterModuleController::class, 'AllCity'])->name('admin.location.all.city.index');
        // Route::get('/all-cities-update', [MasterModuleController::class, 'AllCityUpdate'])->name('all.city.update');
    });
      // Payment
      Route::group(['prefix'  =>   'payment-management'], function() {
        Route::group(['prefix'  =>   'badge'], function() {
            Route::get('', [PaymentManageMentController::class, 'BadgeIndex'])->name('admin.badge.index');
            Route::get('/create', [PaymentManageMentController::class, 'BadgeCreate'])->name('admin.badge.create');
            Route::post('/store', [PaymentManageMentController::class, 'BadgeStore'])->name('admin.badge.store');
            Route::get('/status/{id}', [PaymentManageMentController::class, 'BadgeStatus'])->name('admin.badge.status');
            Route::get('/delete/{id}', [PaymentManageMentController::class, 'BadgeDelete'])->name('admin.badge.delete');
            Route::get('/edit/{id}', [PaymentManageMentController::class, 'BadgeEdit'])->name('admin.badge.edit');
            Route::post('/update', [PaymentManageMentController::class, 'BadgeUpdate'])->name('admin.badge.update');

        });
        Route::group(['prefix'  =>   'transaction'], function() {
            Route::get('', [PaymentManageMentController::class, 'TransactionIndex'])->name('admin.transaction.index');
            Route::get('/export', [PaymentManageMentController::class, 'TransactionDetailsExport'])->name('admin.transaction.details.export');
            // Route::get('/create', [PaymentManageMentController::class, 'BadgeCreate'])->name('admin.badge.create');
            // Route::post('/store', [PaymentManageMentController::class, 'BadgeStore'])->name('admin.badge.store');
            // Route::get('/status/{id}', [PaymentManageMentController::class, 'BadgeStatus'])->name('admin.badge.status');
            // Route::get('/delete/{id}', [PaymentManageMentController::class, 'BadgeDelete'])->name('admin.badge.delete');
            // Route::get('/edit/{id}', [PaymentManageMentController::class, 'BadgeEdit'])->name('admin.badge.edit');
            // Route::post('/update', [PaymentManageMentController::class, 'BadgeUpdate'])->name('admin.badge.update');

        });
    });
      // Inqury
      Route::group(['prefix'  =>   'inquiry-management'], function() {
        Route::group(['prefix'  =>   'inquiry'], function() {
            Route::get('', [AdminInquiryController::class, 'InquiryIndex'])->name('admin.inquiry.index');
            Route::get('/view/{id}', [AdminInquiryController::class, 'InquiryDetailsView'])->name('admin.inquiry.view');
            Route::get('/participants/{id}', [AdminInquiryController::class, 'InquiryParticipantsView'])->name('admin.inquiry.participants');
            Route::get('/inquiry-pdf/{id}', [AdminInquiryController::class, 'InquiryPdfGenarate'])->name('admin.inquiry.pdf');
            Route::get('/export', [AdminInquiryController::class, 'InquiryDetailsExport'])->name('admin.inquiry.details.export');
        });
    });
      // Buyer-cancell-reason
      Route::group(['prefix'  =>   'cancell-reason-management'], function() {
        Route::group(['prefix'  =>   'buyer'], function() {
            Route::get('', [MasterModuleController::class, 'BuyerCancellReasonIndex'])->name('admin.buyer_cancell_reason.index');
            Route::get('/create', [MasterModuleController::class, 'BuyerCancellReasonCreate'])->name('admin.buyer_cancell_reason.create');
            Route::post('/store', [MasterModuleController::class, 'BuyerCancellReasonStore'])->name('admin.buyer_cancell_reason.store');
            Route::get('/edit/{id}', [MasterModuleController::class, 'BuyerCancellReasonEdit'])->name('admin.buyer_cancell_reason.edit');
            Route::post('/update', [MasterModuleController::class, 'BuyerCancellReasonUpdate'])->name('admin.buyer_cancell_reason.update');
            Route::get('/delete/{id}', [MasterModuleController::class, 'BuyerCancellReasonDelete'])->name('admin.buyer_cancell_reason.delete');
        });
    });
      // Seller-cancell-reason
      Route::group(['prefix'  =>   'cancell-reason-management'], function() {
        Route::group(['prefix'  =>   'seller'], function() {
            Route::get('', [MasterModuleController::class, 'SellerCancellReasonIndex'])->name('admin.seller_cancell_reason.index');
            Route::get('/create', [MasterModuleController::class, 'SellerCancellReasonCreate'])->name('admin.seller_cancell_reason.create');
            Route::post('/store', [MasterModuleController::class, 'SellerCancellReasonStore'])->name('admin.seller_cancell_reason.store');
            Route::get('/edit/{id}', [MasterModuleController::class, 'SellerCancellReasonEdit'])->name('admin.seller_cancell_reason.edit');
            Route::post('/update', [MasterModuleController::class, 'SellerCancellReasonUpdate'])->name('admin.seller_cancell_reason.update');
            Route::get('/delete/{id}', [MasterModuleController::class, 'SellerCancellReasonDelete'])->name('admin.seller_cancell_reason.delete');
        });
    });
});