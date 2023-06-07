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
        if (!Auth::check()) return redirect('/login');
        $user = Auth::user();

        // Find the first unpurchased order of the user.
        $order = $user->orders()->ofType('O')->unpurchased()->first();

        // If the user has not added any orders.
        if ($order == null)
            return view('layouts.checkout.no_orders_yet'); 
    
        // Display the checkout page, passing all products ordered and order data.
        return view('layouts.checkout.checkout', [
            'orders' => $this->getOrderAttributes($order->orderLines),
            'order' => $order->toArray(),
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

        // Update the order information in the database.
        $rowAffected = $order->update([
            'is_purchased' => true,
            'delivery_type' => $req->exists('forDelivery') ? 'D' : 'P',
            'address' => $req->address,
            'comment' => $req->comment,
        ]); 
        
        $order->date_needed = Carbon::create($req->date);
        $order->save();
      
        if ($rowAffected == 1) {
            
            $this->getOrderAttributes($order->orderLines);

            $mailData = $order->toArray();
            $mailData['email'] = $user->email;
            $mailData['fname'] = $user->first_name;
            $mailData['order_count'] = count($mailData['order_lines']);
            $mailData['date_needed'] = date('Y/m/d H:i:s',strtotime($req->date));

            // Email user for confirmation of order
            Mail::to($user->email)->send(new OrderMail($mailData));

            $mailData['username'] = $user->name;
            $mailData['email'] = $user->email;
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
        return response()->json(Order::find($req->id)->orderLines->count());
    }

    public function getDateAvailability(Request $req)
    {
        return Order::ofDate(Carbon::parse($req->date)->startOfDay());
    }

    private function getOrderAttributes($orders)
    {
        foreach ($orders as $order)
        {
            $product = $order->product;
            $order->name = $product->name;
            $order->price = $product->price;
            $order->price_10pax = $product->price_10pax;
            $order->price_20pax = $product->price_20pax;
            unset($order->product);
        }
        return $orders->toArray();
    }
    
}
