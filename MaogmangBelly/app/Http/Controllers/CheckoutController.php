<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     *  Gets all orders of user that has not been purchased 
     *  to be displayed in the checkout page
     *  @param Request $req
     *  @return View[login, noOrders, checkout]
     */
    public function checkout(Request $req)
    {

        if ($req->session()->has('user')) {
            // get user id
            $user = $req->session()->get('user')['id'];

            // get unpurchased order of user
            $order = Order::where([
                ['user_id', '=', $user],
                ['is_purchased', 0],
            ])->first();

            // if user has not added any order
            if ($order == null) {
                return "You have not added orders yet";
            }

            // if user has one unpurchased order saved
            // get all orders
            $orders = OrderLine::where('order_id', '=', $order['id'])->get();

            // query the product name and price of every item indicated in the order
            // and add them as fields in orders
            foreach ($orders as $item) {
                $product = Product::where(
                    'id',
                    '=',
                    $item['product_id']
                )->first();
                $item['product_name'] = $product['name'];
                $item['price'] = $product['price'];
            }

            // display checkout page, passing all products ordered and order data
            return view('checkout', [
                'orders' => $orders,
                'order' => $order,
            ]);
        } else {
            // user must be logged in first
            return redirect('/login');
        }
    }
}