<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;


class OrderLineController extends Controller
{

    /**
     * gets all order lines under a specified order
     * @param Request req containing the order id
     * @return JSON response containing all order lines
     */
    public function index(int $id)
    {
       // dd($id);
        return response()->json(Order::find($id)->getOrders());
    }
    
    /**
     * creates a new order line
     * 
     * @param Request req containing all necessary data
     * @return calls a function to return a redirect to orders route
     */
    public function store(Request $req)
    {
        // create order line using passed data
        OrderLine::create([
            'order_id' => $req->order_id,
            'product_id' => $req->product_id,
            'quantity' => $req->quantity,
            'total_price' => $req->total_price
        ]);
        return $this->redirectTo($req->order_type);
    }
    /**
     * Updates the quantity and total price of an order line, and the grand total of the order.
     *
     * @param Request $req The HTTP request containing order line ID and item quantity.
     * @return RedirectResponse A redirect response to the checkout order page.
     */
    public function update(Request $req)
    {
        // Find the order line to update
        $orderLine = OrderLine::find($req->order_line);
        // Find the order that the order line belongs to
        $order = $orderLine->order;

        // If the new quantity is zero, delete the order line and the order if it has no remaining order lines
        if ($req->item_quantity == 0) {
            $orderLine->delete();
            if ($order->countOrders() == 0)
                $order->delete();
            return redirect('/order');
        }

        // Get the ID and price of the product associated with the order line
        $product = $orderLine->product;
        $product_price = $product['price'];

        // Calculate the new total price of the order line
        $old_price = $orderLine['total_price'];
        $new_price = $product_price * $req->item_quantity;

        // Update the grand total of the order
        $order->grand_total = $order['grand_total'] - $old_price + $new_price;
        $order->save();

        // Update the quantity and total price of the order line
        $orderLine->quantity = $req->item_quantity;
        $orderLine->total_price = $new_price;
        $orderLine->save();

        return $this->redirectTo($req->order_type);
    }
    /**
     * Delete an order line by ID and update the corresponding order's grand total.
     * If the order has no remaining order lines after deletion, delete the order as well.
     * @param Request $req The HTTP request object containing the order line ID
     * @return RedirectResponse A redirect to the checkout order page
     */
    public function destroy(Request $req)
    {
        // Find the order line to delete
        $order_line = OrderLine::find((int) $req->order_line);

        // Find the order that the order line belongs to
        $order = $order_line->order;

        // Subtract the order line's total price from the order's grand total
        $price = $order_line['total_price'];
        $order->grand_total = $order['grand_total'] - $price;
        $order_line->delete();

          // If no remaining order lines, delete the order
        if ($order->countOrders() == 0) 
            $order->delete();
        else  // If there are remaining order lines, update the order's grand total
            $order->save();

        return $this->redirectTo($req->order_type);

    }

    /**
     * The function redirects the user to different pages based on the order
     * type parameter passed.
     * 
     * @param order_type The parameter order_type is a variable that
     * is used to determine which page to redirect to.
     * @return RedirectResponse to a specific URL based on the value of the
     * parameter
     */
    private function redirectTo($order_type)
    {
        if ($order_type == "O")
            return redirect('/order');
        if ($order_type == "C")
            return redirect('/catering')->with('scroll', true);
        if ($order_type == "R")
            return redirect('/reservations')->with('scroll', true);
    }
}
