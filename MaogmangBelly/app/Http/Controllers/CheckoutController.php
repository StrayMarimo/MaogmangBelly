<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $order_type = ($req->exists('forDelivery')) ? 'D' : 'P';

        // Get the authenticated user's id and their first unpurchased order.
        $user = Auth::user();
        $order = Order::where([
            ['user_id', '=', $user->id],
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


            $shortcode = "2790";
            $access_token = $user->access_token;
            $address = $user->mobile_number;
            $clientCorrelator = '';
            $characters = '0123456789';
            for($i = 0; $i < 4; $i++){
                $clientCorrelator .= $characters[random_int(0, strlen($characters) - 1)];
            }
            $message = "Test Message for order confirmation";
            
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/".$shortcode."/requests?access_token=".$access_token ,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\"outboundSMSMessageRequest\": { \"clientCorrelator\": \"".$clientCorrelator."\", \"senderAddress\": \"".$shortcode."\", \"outboundSMSTextMessage\": {\"message\": \"".$message."\"}, \"address\": \"".$address."\" } }",
              CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
              ),
            ));
            $response = curl_exec($curl);
            // $err = curl_error($curl);
            // curl_close($curl);
            // if ($err) {
            //   echo "cURL Error #:" . $err;
            // } else {
            //   echo $response;
            // }
        
        // $clientCor = '';
        // $characters = '0123456789';
        // for($i = 0; $i < 4; $i++){
        //     $clientCor .= $characters[random_int(0, strlen($characters) - 1)];
        // }
        // $payload = array('outboundSMSMessageRequest' => array(
        //     'clientCorrelator' => $clientCor,
        //     'senderAddress' => '2790',
        //     'outboundSMSTextMessage' => array('message' => 'Test Message for order confirmation'),
        //     'address' => $user->mobile_number,
        //     //'access_token' => $user->access_token,
        // ));
        // $payload = json_encode($payload);
        
        // // Send text message indicating successful order
        // $response = Http::withHeaders([
        //     'content-type' => 'application/json'
        // ])->withBody(
        //     $payload
        // )->post('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/2790/requests?access_token='.$user->access_token);
        dd($response, $user);
        // Return a message indicating that the order has been successfully purchased.
        return "Successfully bought order with id " . strval($order['id']);
    }
}
