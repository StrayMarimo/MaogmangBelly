<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //

    function checkout(Request $req) {
        if ($req->session()->has('user')) {
            $user = $req->session()->get('user')['id'];
            $order = Order::where([
                ['user_id', '=', $user],
                ['is_purchased', 0],
            ])->first();

            $orders = OrderLine::where('order_id', '=', $order['id'])->get();
           
            foreach ($orders as $item)
            {
                $product = Product::where(
                    'id', '=', $item['product_id'])->first();
                $item['product_name'] = $product['name'];
                $item['price'] = $product['price'];
            }

            return view('checkout', [
                'orders' => $orders, 
                'order' => $order,
            ]);
        } else
        {
            return redirect('/login');
        }
    }
}
