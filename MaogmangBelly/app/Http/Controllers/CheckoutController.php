<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderMail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{ 
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
        if (!Auth::check())
            return redirect('/login');

        // Get the user id
        $user = Auth::user()->id;

        // Find the first unpurchased order of the user.
        $order = Order::ofUser($user)->ofType('O')->unpurchased()->first();

        // If the user has not added any orders.
        if ($order == null)
            return view('layouts.checkout.no_orders_yet'); 
        
        // If the user has one unpurchased order saved, get all orders.
        $orders = $this->chunkOrders(OrderLine::ofOrder($order->id));
        

        // Display the checkout page, passing all products ordered and order data.
        return view('layouts.checkout.checkout', [
            'orders' => $orders,
            'order' => $order,
        ]);
       
    }

    /**
     * Purchases the order of the authenticated user and updates the order information in the database.
     * @param Request $req - the HTTP request object.
     * @return string - a message indicating that the order has been successfully purchased.
     */
    public function buy(Request $req)
    {
        $user = Auth::user();
        $order = Order::find($req->order_id);

         // Determine the order type
        $delivery_type = ($req->exists('forDelivery')) ? 'D' : 'P';

        if ($order['order_type'] == 'C' || $order['order_type'] == 'R')
            $delivery_type = 'D';

        // Update the order information in the database.
        $rowAffected = $order->update([
            'is_purchased' => true,
            'date_needed' => $req->date,
            'delivery_type' => $delivery_type,
            'address' => $req->address,
            'comment' => $req->comment,
        ]);     
        
        if ($rowAffected == 1) {
            
            // If the user has one unpurchased order saved, get all orders.
            $orders = OrderLine::ofOrder($order->id);
              
            // For each item in the order, query the product name and price and add them as fields in orders.
            foreach ($orders as $item) {
                $product = Product::where('id', '=', $item['product_id'])->first();
                $item['product_name'] = $product['name'];
                $item['price'] = $product['price'];
            }
        
            $mailData = [
                'email' => $user->email,
                'fname' => $user->first_name,
                'orderid' => $order['id'],
                'orders' => $orders,
                'order_count' => count($orders),
                'grandTotal' => $order['grand_total'],
                'order_type' => $order->order_type,
                'delivery_type' => $delivery_type,
                'address' => $req->address,
                'date_needed' => date('Y/m/d H:i:s',strtotime($req->date))
            ];

            // Email user for confirmation of order
            Mail::to($user->email)->send(new OrderMail($mailData));

            $mailData['username'] = Auth::user()->name;
            $mailData['email'] = Auth::user()->email;
            Mail::to('maogmangbelly@gmail.com')->send(new AdminOrderMail($mailData));
            return redirect()->route('products')->with([
                'status' => 200,
                'message' => "Successfully bought order with id " . strval($order['id']),
                'success' => true
            ]);
        } else {
            return redirect()->route('products')->with([
                'status' => 404,
                'message' => "Failed buying order with id " . strval($order['id']),
                'success' => false
            ]);
        }
    }

    public function getOrderLinesCount(Request $req)
    {
        return response()->json(OrderLine->orderCount($req->id));
    }

    public function getDateAvailability(Request $req)
    {
             
        $passedDate = Carbon::parse($req->date)->startOfDay();
        $recordExists = Order::whereDate('date_needed', $passedDate)->exists();

        return $recordExists;
    }

    public function chunkOrders($orders)
    {
        // For each item in the order, query the product name and price and add them as fields in the order line.
        foreach ($orders as $item) {
            $product = Product::find($item['product_id']);
            $item['product_name'] = $product['name'];
            $item['price'] = $product['price'];
        }
        return $orders;
    }
    
}
