<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings')) {
            $logo = Setting::where('key', 'logo')->first();
            $name = Setting::where('key', 'name')->first();
            $background = Setting::where('key', 'background')->first();
            View::share([
                'logo' => $logo,
                'name' => $name,
                'background' => $background
            ]);
        }
    }
}
