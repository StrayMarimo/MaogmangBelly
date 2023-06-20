<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\OrderLineController;
class OrderController extends Controller
{

    function index()
    {
         // user must be logged in first
        if (!Auth::check()) return redirect('/login');

        $user = Auth::user();
        if($user->is_admin)
            $orders = Order::all();
        else
            $orders = $user->orders;
        
        foreach ($orders as $item)
            $item['order_count'] =  $item->countOrders();
        
        return view('layouts.history.purchase_history', [
            'orders' => $orders, 
            'isAdmin' => $user->is_admin
        ]);
    }

    /**
     * Adds product to user's cart
     *
     * @param Request $req request object containing product_id and quantity
     *
     * @return RedirectResponse returns redirect to checkout_order if user is logged in,
     * else redirects user to login page
     */
    function store(Request $req)
    {
        // user must be logged in first
        if (!Auth::check()) return redirect('/login');
    
        // get all needed data [user, product, total_price]
        $user = Auth::user();
        $product = Product::find($req->product_id);
        $total_price = $product['price'] * $req->quantity;
        $order = $user->orders()->OfType($req->order_type)->unpurchased()->first();

        // if no order exists, create new one
        if ($order == null) {
            $order = Order::create([
                'user_id' => $user->id,
                'order_type' => $req->order_type,
                'is_purchased' => false
            ]);
        }
     
        // update grand total of order by adding it with the total_price
        $order->update(['grand_total' =>  $order['grand_total'] + $total_price]);

        return redirect()->action([OrderLineController::class, 'store'], [
            'order_id' => $order->id,
            'product_id' => $req->product_id,
            'quantity' => $req->quantity,
            'total_price' => $total_price,
            'order_type' => $req->order_type
        ]);
      
    }

    /**
     * deletes all orders
     *
     * @param  Request  $req  The HTTP request containing the order id.
     * @return RedirectResponse  A redirect back to the home page.
     */
    function destroy(Request $req)
    {
        // Delete all orders with the specified ID
        Order::destroy($req->order_id);

        // Redirect to the home page
        return redirect()->route('order');
    }

    /**
     * completes an order transaction
     *
     * @param  Request  $req  The HTTP request containing the order id.
     * @return RedirectResponse  A page refresh
     */
    function update(Request $req)
    {
        $order = Order::find($req->order);
        $order->date_completed = Carbon::now();
        $order->save();
        return redirect()->action([OrderController::class, 'index']);
    }


}
