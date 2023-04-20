<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
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
            ])->first();

            // If the user has not added any orders.
            if ($order == null) {
                return "You have not added any orders yet";
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
        $order_type = ($req->exists('forDelivery')) ? 'D' : 'P';

        // Get the authenticated user's id and their first unpurchased order.
        $user = Auth::user()->id;
        $order = Order::where([
            ['user_id', '=', $user],
            ['is_purchased', '=', false]
        ])->first();

        // Update the order information in the database.
        DB::table("orders")
            ->where('id', $order['id'])
            ->update([
                'is_purchased' => true,
                'order_type' => $order_type,
                'address' => $req->address
            ]);

        // Return a message indicating that the order has been successfully purchased.
        return "Successfully bought order with id " . strval($order['id']);
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

        // Redirect to the checkout order page
        return redirect('/order');
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

         // Redirect to the checkout order page
        return redirect('/order');
    }

}
