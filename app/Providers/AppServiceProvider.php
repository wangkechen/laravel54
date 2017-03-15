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
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives', 'tags'));
            /*
             *
            $view->with('archives', \App\Post::archives());
            //列出所有的标签
            // $view->with('tags',\App\Tag::pluck('name'));
            //只列出有posts的标签
            $view->with('tags',\App\Tag::has('posts')->pluck('name'));
            */
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
