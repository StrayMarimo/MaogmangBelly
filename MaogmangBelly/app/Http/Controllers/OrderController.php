<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Adds product to user's cart
     *
     * @param Request $req request object containing product_id and quantity
     *
     * @return RedirectResponse|HttpResponse returns redirect to checkout_order if user is logged in,
     * else redirects user to login page
     */
    function addToOrder(Request $req)
    {
        // user must be logged in first
        if (!Auth::check()) {
            return redirect('/login');
        }
        // create new Order Line
        $order_line = new OrderLine;

        // get all needed data [user_id, product, total_price]
        $user = Auth::user()->id;
        $product = Product::find($req->product_id);
        $total_price = $product['price'] * $req->quantity;

        // check if user has an already saved unpurchased order
        $orders = Order::where([
            ['user_id', '=', $user],
            ['order_type', '=', $req->order_type],
            ['is_purchased', 0],
        ])->get();

        $delivery_type = ($req->order_type == "C" || $req->order_type == "R") ? 'D' : 'X';

        // if no order exists, create new one
        if (count($orders) == 0) {
            $newOrder = new Order;
            $newOrder->user_id = $user;
            $newOrder->order_type = $req->order_type;
            $newOrder->delivery_type = $delivery_type;
            $newOrder->is_purchased = false;
            $newOrder->save();
        }

        // get id of order
        $order = Order::where([
            ['user_id', '=', $user],
            ['order_type', '=', $req->order_type],
            ['is_purchased', 0],
        ])->first();

        // update grand total of order by adding it with the total_price
        $grand_total = $order['grand_total'] + $total_price;
        DB::table("orders")
            ->where('id', $order['id'])
            ->update(['grand_total' => $grand_total]);

        // store and save details of order line
        $order_line->order_id = $order['id'];
        $order_line->product_id = $req->product_id;
        $order_line->quantity = $req->quantity;
        $order_line->total_price = $total_price;

        $order_line->save();

        if ($req->order_type == "O")
            return redirect('/order');
        if ($req->order_type == "C")
            return redirect('/catering')->with('scroll', true);
        if ($req->order_type == "R")
            return redirect('/reservations')->with('scroll', true);
        
    }

    /**
     * Updates the quantity and total price of an order line, and the grand total of the order.
     *
     * @param Request $req The HTTP request containing order line ID and item quantity.
     * @return RedirectResponse A redirect response to the checkout order page.
     */
    function editOrderQty(Request $req)
    {
        // Find the order line to update
        $order_line = OrderLine::find($req->order_line_id);

        // Find the ID of the order that the order line belongs to
        $order_id = $order_line['order_id'];

        // Find the order that the order line belongs to
        $order = Order::find($order_id);

        // If the new quantity is zero, delete the order line and the order if it has no remaining order lines
        if ($req->item_quantity == 0) {
            $order_line->delete();
            $order_lines = OrderLine::where('order_id', $order_id)->get();
            if (count($order_lines) == 0)
                $order->delete();
            return redirect('/order');
        }

        // Get the ID and price of the product associated with the order line
        $product_id = $order_line['product_id'];
        $product_price = Product::find($product_id)['price'];

        // Calculate the new total price of the order line
        $old_price = $order_line['total_price'];
        $new_price = $product_price * $req->item_quantity;

        // Update the grand total of the order
        $order->grand_total = $order['grand_total'] - $old_price + $new_price;
        $order->save();

        // Update the quantity and total price of the order line
        $orderLine = OrderLine::find($req->order_line_id);
        $orderLine->quantity = $req->item_quantity;
        $orderLine->total_price = $new_price;
        $orderLine->save();


        if ($req->order_type == "O")
            return redirect('/order');
        if ($req->order_type == "C")
            return redirect('/catering')->with('scroll', true);
        if ($req->order_type == "R")
            return redirect('/reservations')->with('scroll', true);
    }
    /**
     * Delete an order line by ID and update the corresponding order's grand total.
     * If the order has no remaining order lines after deletion, delete the order as well.
     * @param Request $req The HTTP request object containing the order line ID
     * @return RedirectResponse A redirect to the checkout order page
     */
    function deleteOrderLine(Request $req)
    {
        // Find the order line to delete
        $order_line = OrderLine::find($req->order_line_id);

        // Find the order that the order line belongs to
        $order_id = $order_line['order_id'];
        $order = Order::find($order_id);

        // Subtract the order line's total price from the order's grand total
        $price = $order_line['total_price'];
        $order->grand_total = $order['grand_total'] - $price;
        $order_line->delete();

        // Check if the order has any remaining order lines
        $order_lines = OrderLine::where('order_id', $order_id)->get();
        if (count($order_lines) == 0) {
            // If no remaining order lines, delete the order
            $order->delete();
        } else {
            // If there are remaining order lines, update the order's grand total
            $order->save();
        }


        if ($req->order_type == "O")
            return redirect('/order');
        if ($req->order_type == "C")
            return redirect('/catering')->with('scroll', true);
        if ($req->order_type == "R")
            return redirect('/reservations')->with('scroll', true);
    }

    /**
     * Add a new category to the database.
     *
     * @param  Request  $req  The HTTP request containing the order id.
     * @return RedirectResponse  A redirect back to the home page.
     */
    function cancelAllOrders(Request $req)
    {
        // Delete all orders with the specified ID
        Order::where('id', $req->order_id)->delete();

        // Redirect to the home page
        return redirect('/');
    }


    function getAllOrders(Request $req)
    {
        $isAdmin = false;
        $orders = [];
         // user must be logged in first
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if ($user->is_admin) {
            $isAdmin = true;
        }

        if($isAdmin)
            $orders = Order::all();
        else
            $orders = Order::where(
                'user_id', '=', $user->id,
            )->get();
        
        foreach ($orders as $item) {
            $item['order_count'] =  OrderLine::where('order_id', '=', $item['id'])->count();
        }

        return view('layouts.history.purchase_history', ['orders' => $orders, 'isAdmin' => $isAdmin]);
    }

    function completeOrder(Request $req)
    {

       $rowsAffected = DB::table("orders")
            ->where('id',(int) $req->order_id)
            ->update(['date_completed' => Carbon::now()]);

       
        if ($rowsAffected > 0) {
            return redirect()->route('get_orders')->with([
                'status' => 200,
                'message' => 'Order '.$req->order_id.' is now completed',
                'success' => true
            ]);
        } else {
            return redirect()->route('get_orders')->with([
                'status' => 404,
                'message' => 'Order '.$req->order_id.'completion failed',
                'success' => false
            ]);
        }
    }


    function getOrderLines(Request $req)
    {
 
        $orders = OrderLine::where('order_id', '=', $req->id)->get();

        foreach ($orders as $item) {
            $product = Product::where('id', '=', $item['product_id'])->first();
            $item['product_name'] = $product['name'];
            $item['price'] = $product['price'];
        }

        return response()->json($orders);
    }
}
