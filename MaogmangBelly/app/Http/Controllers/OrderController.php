<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderLineController;
class OrderController extends Controller
{

    /**
     * gets all user orders
     * @return View - purchase history view with relevan order data
     */
    public function index()
    {
        $user = Auth::user();
        if($user->is_admin)
            $orders = Order::all();
        else
            $orders = $user->orders;
        
        // add a field in each order object specifying count of order lines
        foreach ($orders as $item)
            $item['order_count'] =  $item->countOrders();
        
        // return view with necessary data
        return view('layouts.history.purchase_history', [
            'orders' => $orders, 
            'isAdmin' => $user->is_admin
        ]);
    }

    /**
     * Adds an order if no existing order, otherwise update of user order data
     *
     * @param Request $req request object containing product_id and quantity
     * @return RedirectResponse returns redirect to checkout_order if user is logged in,
     * else redirects user to login page
     */
    public function store(Request $req)
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

        // add an order line associated with this order
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
     * @param  Request req 
     * @return RedirectResponse  A redirect back to the home page.
     */
    public function destroy(int $id)
    {
        // Delete all orders with the specified ID
        Order::destroy($id);

        // Redirect to the home page
        return redirect()->route('order');
    }

    /**
     * completes an order transaction
     *
     * @param  Request  $req  The HTTP request containing the order id.
     * @return RedirectResponse  A page refresh
     */
    public function update(int $id)
    {
        $order = Order::find($id);
        $order->date_completed = Carbon::now();
        $order->save();
        return redirect()->action([OrderController::class, 'index']);
    }


}
