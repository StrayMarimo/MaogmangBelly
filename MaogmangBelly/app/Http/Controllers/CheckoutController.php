<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    //TODO: SHOULD RETURN A PAGE WITH NO ORDERS YET

    /**
     * Gets all orders of the user that have not been purchased to be displayed in the checkout page.
     * @param Request $req - the HTTP request object.
     * @return string|View - if the user is not authenticated, redirects to the login page. 
     *                       if the user has not added any orders yet, returns a string message. 
     *                       Otherwise, returns the checkout page with all the products ordered and order data.
     */
    public function checkout(Request $req)
    {
        // Check if the user is authenticated.
        if (Auth::check()) {

            // Get the user id.
            $user = Auth::user()->id;

            // Find the first unpurchased order of the user.
            $order = Order::where([
                ['user_id', '=', $user],
                ['is_purchased', 0],
                ['order_type', '=', 'O']
            ])->first();

            // If the user has not added any orders.
            if ($order == null) {
                return view('layouts.checkout.no_orders_yet'); 
            }

            // If the user has one unpurchased order saved, get all orders.
            $orders = OrderLine::where('order_id', '=', $order['id'])->get();

            // For each item in the order, query the product name and price and add them as fields in orders.
            foreach ($orders as $item) {
                $product = Product::where('id', '=', $item['product_id'])->first();
                $item['product_name'] = $product['name'];
                $item['price'] = $product['price'];
            }

            // Display the checkout page, passing all products ordered and order data.
            return view('layouts.checkout.checkout', [
                'orders' => $orders,
                'order' => $order,
            ]);
        } else {
            // Redirect the user to the login page if they are not authenticated.
            return redirect('/login');
        }
    }

    //TODO: SHOULD RETURN A PAGE

    /**
     * Purchases the order of the authenticated user and updates the order information in the database.
     * @param Request $req - the HTTP request object.
     * @return string - a message indicating that the order has been successfully purchased.
     */
    function buy(Request $req)
    {

        // Determine the order type based on the existence of the 'forDelivery' key in the request object.
        $delivery_type = ($req->exists('forDelivery')) ? 'D' : 'P';
        
        // Get the authenticated user's id and their first unpurchased order.
        $user = Auth::user()->id;
        $order = Order::where('id', $req->order_id)->first();

        if ($order['order_type'] == 'C' || $order['order_type'] == 'R')
            $delivery_type = 'D';
        // Update the order information in the database.
        DB::table("orders")
            ->where('id', $order['id'])
            ->update([
                'is_purchased' => true,
                'date_purchased' => Carbon::now(),
                'date_needed' => $req->date,
                'delivery_type' => $delivery_type,
                'address' => $req->address
            ]);

        // Return a message indicating that the order has been successfully purchased.
        return "Successfully bought order with id " . strval($order['id']);
    }
}
