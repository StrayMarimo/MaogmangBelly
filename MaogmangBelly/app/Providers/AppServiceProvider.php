<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function ($view) {
            $order_qty = 0;
            if (Auth::user() ) {
                $user = Auth::user()->id;


                $order = Order::where([
                    ['user_id', '=', $user],
                    ['is_purchased', 0],
                ])->first();

                if ($order != null) {
                    $orders = OrderLine::where('order_id', '=', $order['id'])->get();
                    $order_qty = count($orders);
                }

            }
            
            $view->with('order_qty', $order_qty);
        });
    }
}
