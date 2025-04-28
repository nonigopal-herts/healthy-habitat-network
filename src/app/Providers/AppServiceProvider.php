<?php

namespace App\Providers;

use App\Models\ProductServiceCategory;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share product categories with all views
        View::composer('layouts.frontend_components.header', function ($view) {
            $productCategories = ProductServiceCategory::all();
            $view->with('productCategories', $productCategories);
        });

        Paginator::useBootstrap();
    }
}
