<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
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
    // public function boot()
    // {
    //     Paginator::useBootstrap();
    // }
    public function boot()
    {
        Paginator::useBootstrap();
       \URL::forceRootUrl(\Config::get('app.url'));    
       if (str_contains(\Config::get('app.url'), 'https://')) {
           \URL::forceScheme('https');
       }
    }
}
