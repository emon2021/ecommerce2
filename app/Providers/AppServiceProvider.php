<?php

namespace App\Providers;

use App\Models\Currency;
use App\Models\Review;
use Illuminate\Support\ServiceProvider;

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
        //  settings share
        $setting = Currency::first();
        if($setting)
        {
            view()->share('setting',$setting);
        }
        
    }
}
