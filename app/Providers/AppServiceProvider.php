<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    

    public function boot()
    {
         Schema::DefaultStringLength(191);

         view()->composer('frontend.layout.sidebar' , function($view){
            $view->with('categories',\App\Model\user\category::GettingTotalCategoryNameOnSingleProductSidebar());
        });

        view()->composer('frontend.layout.sidebar' , function($view){
            $view->with('brands',\App\Model\user\brand::GettingTotalBrandNameOnSingleProductSidebar());
        });

         view()->composer('frontend.layout.header' , function($view){
            $view->with('items',\App\Model\user\category::GettingTotalCategoryNameOnHeader());
        });

         view()->composer('frontend.layout.header' , function($view){
            $view->with('headerCartCount',\App\Model\user\Cart::cart());
        });
         view()->composer('frontend.layout.header' , function($view){
            $view->with('total',\App\Model\user\Cart::GettingCostFromCartForHeader());
        });

          view()->composer('admin.layout.app' , function($view){
            $view->with('notify',\App\Model\user\Order::OrderNotification());
        });
          view()->composer('admin.index' , function($view){
            $view->with('notification',\App\Model\user\Order::Notification());
        });
    }

   
    public function register()
    {
        //
    }
}
