<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\VendorContract;
use App\Repositories\VendorRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    
    public function register()
    {
        $this->app->bind(VendorContract::class, VendorRepository::class);
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view::composer('*', function($view) {
            // Service
            $ServiceTableExists = Schema::hasTable('products');
            if ($ServiceTableExists) {
                $products = Product::groupBy('title')->pluck('title')->toArray();
            }
            // Collection
            $CollectionTableExists = Schema::hasTable('collections');
            if ($CollectionTableExists) {
                $collections = Collection::groupBy('title')->pluck('title')->toArray();
            }
            // Category
            $CategoryTableExists = Schema::hasTable('categories');
            if ($CategoryTableExists) {
                $categories = Category::groupBy('title')->pluck('title')->toArray();
            }
            // Category
            $UserTableExists = Schema::hasTable('users');
            if ($UserTableExists) {
                $User_city = User::whereNotNull('city')->groupBy('city')->pluck('city')->toArray();
                $User_state = User::whereNotNull('state')->groupBy('state')->pluck('state')->toArray();
            }
            $allLocation = array_merge($User_city, $User_state);
            $allTitles = array_merge($products, $collections, $categories);
            view()->share('global_filter_location', $allLocation);
            view()->share('global_filter_data', $allTitles);
        });
    }
}
