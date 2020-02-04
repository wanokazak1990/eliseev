<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CartService\Cart;

class CartProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*$this->app->singleton('App\Services\CartService\Cart',function($app){
            return new Cart();
        });*/
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Cart::class,function(){
            return new Cart();
        });
    }
}
