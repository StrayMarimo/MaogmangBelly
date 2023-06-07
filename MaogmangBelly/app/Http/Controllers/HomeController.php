<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the home page.
     *
     * @return View - the home view.
     */
    public function index()
    {
        return view('layouts.home.home');
    }


    /**
     * Show the catering page.
     *
     * @return View - the catering view.
     */
    public function catering()
    {
        // Get the user id.

        $user = Auth::user();
        $hasOrder = false;
        $scroll = session()->has('scroll') ? true : false;

        if ($user == null)
            return view('layouts.catering.catering', compact('scroll', 'hasOrder'));
        
        $order = $user->orders()->ofType('C')->unpurchased()->first();
        // If the user has not added any orders.
        if ($order == null) {
            return view('layouts.catering.catering', compact('scroll', 'hasOrder'));
        } else{

            $hasOrder = true;
            // If the user has one unpurchased order saved, get all orders.
            $orders = OrderLine::where('order_id', '=', $order['id'])->get();

            // For each item in the order, query the product name and price and add them as fields in orders.
            foreach ($orders as $item) {
                $product = Product::where('id',
                    '=',
                    $item['product_id']
                )->first();
                $item['product_name'] = $product['name'];
                $item['price'] = $product['price'];
            }

            return view('layouts.catering.catering', compact('scroll', 'hasOrder', 'orders', 'order'));
        } 
    }


    /**
     * Show the contact us page.
     *
     * @return View - the contact view.
     */
    public function contact()
    {
        return view('layouts.contact.contact');
    }


    /**
     * Show the about us page.
     *
     * @return View - the about view.
     */
    public function about()
    {
        return view('layouts.about.about');
    }

    /**
     * Show the reservations page.
     *
     * @return View - the reservations view.
     */
    public function reservations()
    {

        // Get the user id.
        $user = Auth::user();
        $scroll = session()->has('scroll') ? true : false;
        $hasOrder = false;

        if ($user == null) {
            return view('layouts.reservations.reservations', compact('scroll', 'hasOrder')); 
        }

        $order = Order::where([
            ['user_id', '=', $user->id],
            ['order_type', '=', 'R'],
            ['is_purchased', 0],
        ])->first();

       

        // If the user has not added any orders.
        if ($order == null) {
            return view('layouts.reservations.reservations', compact('scroll', 'hasOrder'));
        } else{

            $hasOrder = true;
            // If the user has one unpurchased order saved, get all orders.
            $orders = OrderLine::where('order_id', '=', $order['id'])->get();

            // For each item in the order, query the product name and price and add them as fields in orders.
            foreach ($orders as $item) {
                $product = Product::where('id',
                    '=',
                    $item['product_id']
                )->first();
                $item['product_name'] = $product['name'];
                $item['price'] = $product['price'];
                $item['gallery'] = $product['gallery'];
            }
            // dd($orders, $order);
            return view('layouts.reservations.reservations', compact('scroll', 'hasOrder', 'orders', 'order'));
        } 
        // $scroll = session()->has('scroll') ? true : false;
        // return view('layouts.reservations.reservations', compact('scroll'));
    }

}
