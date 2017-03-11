<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.sidebar', function ($view) {
            $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * 全局
         \App::singleton('App\Billing\Stripe', function (){

            return new \App\Billing\Stripe(config('services.stripe.secret'));

        });
        */


       /*
       $this->app->singleton('App\Billing\Stripe', function (){

            return new \App\Billing\Stripe(config('services.stripe.secret'));

        });
       */

        $this->app->singleton(Stripe::class, function (){

            return new Stripe(config('services.stripe.secret'));

        });


    }
}
