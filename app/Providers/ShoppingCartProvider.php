<?php

namespace App\Providers;

use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*", function ($view) {
            $session_name = 'shopping_cart_id';
            // $shopping_cart_id = Session::get($session_name);
            // $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);
            if (Auth()->check()) {
                $shopping_cart = ShoppingCart::getUserShoppingCart();
                Session::put($session_name, $shopping_cart->id);
                $view->with('shopping_cart', $shopping_cart);
            } else {
                $shopping_cart = ShoppingCart::getSessionShoppingCart();
                Session::put($session_name, $shopping_cart->id);
                $view->with('shopping_cart', $shopping_cart);
            }
        });
    }
}