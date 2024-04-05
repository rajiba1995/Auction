<?php

use Illuminate\Support\Facades\Route;
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'adminlogin'])->name('admin.login.check');
Route::get('admin/logout', [LoginController::class, 'adminlogout'])->name('admin.logout');


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Banner Management
        Route::group(['prefix'  =>   'master'], function() {
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
            Route::group(['prefix'  =>   'collection'], function() {
                Route::get('', [MasterModuleController::class, 'CollectionIndex'])->name('admin.collection.index');
                Route::get('/create', [MasterModuleController::class, 'CollectionCreate'])->name('admin.collection.create');
                Route::post('/store', [MasterModuleController::class, 'CollectionStore'])->name('admin.collection.store');
                Route::get('/edit/{id}', [MasterModuleController::class, 'CollectionEdit'])->name('admin.collection.edit');
                Route::post('/update', [MasterModuleController::class, 'CollectionUpdate'])->name('admin.collection.update');
                Route::get('/delete/{id}', [MasterModuleController::class, 'CollectionDelete'])->name('admin.collection.delete');
                Route::get('/status/{id}', [MasterModuleController::class, 'CollectionStatus'])->name('admin.collection.status');
                
            });
            // Category Management
            Route::group(['prefix'  =>   'category'], function() {
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
        });
        // Social-media Management
        Route::group(['prefix'  =>   'social_media'], function() {
            Route::get('', [MasterModuleController::class, 'SocialMediaIndex'])->name('admin.social_media.index');
            Route::get('/create', [MasterModuleController::class, 'SocialMediaCreate'])->name('admin.social_media.create');
            Route::post('/store', [MasterModuleController::class, 'SocialMediaStore'])->name('admin.social_media.store');
            Route::get('/edit/{id}', [MasterModuleController::class, 'SocialMediaEdit'])->name('admin.social_media.edit');
            Route::post('/update', [MasterModuleController::class, 'SocialMediaUpdate'])->name('admin.social_media.update');
            Route::get('/delete/{id}', [MasterModuleController::class, 'SocialMediaDelete'])->name('admin.social_media.delete');
            Route::get('/status/{id}', [MasterModuleController::class, 'SocialMediaStatus'])->name('admin.social_media.status');
            
        });
   
});

