<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminOrderMail;
use App\Mail\OrderMail;
use App\Models\Order;
use Carbon\Carbon;



class CheckoutController extends Controller
{ 
    /**
     * Purchases the order of the user
     * @param Request req containing order details
     * @return RedirectResponse to home page
     */
    public function buy(Request $req)
    {
        // gets user and order record
        $user = Auth::user();
        $order = Order::find($req->order_id);

    
        // updated order record
        $rowAffected = $order->update([
            'is_purchased' => true,
            'delivery_type' => $req->exists('forDelivery') ? 'D' : 'P',
            'address' => $req->address,
            'comment' => $req->comment,
        ]); 
        $order->date_needed = Carbon::create($req->date);
        $order->save();

        if ($rowAffected == 1) 
        {
            $order->getOrders();

            // set mail data
            $mailData = $order->toArray();
            $mailData['email'] = $user->email;
            $mailData['fname'] = $user->first_name;
            $mailData['order_count'] = count($mailData['order_lines']);
            $mailData['date_needed'] = date('Y/m/d H:i:s',strtotime($req->date));

            // Email user for order purchase
            Mail::to($user->email)->send(new OrderMail($mailData));

            // Email admin for order purchase
            $mailData['username'] = $user->name;
            $mailData['email'] = $user->email;
            Mail::to('maogmangbelly@gmail.com')->send(new AdminOrderMail($mailData));

            // redirect user to home page with success session message and status
            return redirect()->route('home')->with([
                'message' => "Successfully bought order with id " . strval($order['id']),
                'success' => true
            ]);
        } 

        // otherwise redirect user to home page with failed session message and status
        return redirect()->route('home')->with([
            'message' => "Failed buying order with id " . strval($order['id']),
            'success' => false
        ]);
        
    }

    /**
     * returns the count of order lines for a specific order 
     * 
     * @param Request req containing order id
     * @return JSON response contains the count of order lines
     */
    public function getOrderLinesCount(Request $req)
    {
        return response()->json(Order::find($req->id)->orderLines->count());
    }

   /**
    * returns the order of a booked date
    * 
    * @param Request req contains the date thatt will be queried
    * @return order objects collectionthat have the same date
    * with its "date_needed" field
    */
    public function getDateAvailability(Request $req)
    {
        return Order::ofDate(Carbon::parse($req->date)->startOfDay());
    }
    
}
