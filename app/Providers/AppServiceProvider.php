<?php

namespace App\Providers;

use App\Cart;
use App\ProductType;
use Session;
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
        view()->composer('header',function($view){
            $category = ProductType::all();

            $view->with('category',$category);
        });

        view()->composer(['header','page.dat_hang'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty]);
            }
        });
    }
}
