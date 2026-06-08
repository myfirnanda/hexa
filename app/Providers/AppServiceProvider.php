<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::composer('partials.header', function ($view) {
            $view->with('firstProduct', Product::query()->orderBy('sort_order')->first());
        });

        View::composer('layouts.admin', function ($view) {
            $view->with('adminPendingCount', Order::where('status', 'pending')->count());
        });
    }
}
