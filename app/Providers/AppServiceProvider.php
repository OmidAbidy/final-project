<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('isadmin', function(){
            return Auth::user()->role == 'admin';
        });

        Gate::define('isfreelancer', function(){
            return Auth::user()->role == 'freelancer'; 
        });

        Gate::define('isclient', function(){
            return Auth::user()->role == 'client'; 
        });
    }
}
