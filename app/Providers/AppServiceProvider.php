<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\EloquentUserProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Customize the user provider to use the 'Password' column
        Auth::provider('custom', function ($app, array $config) {
            return new EloquentUserProvider($app['hash'], $config['model']);
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
