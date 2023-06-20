<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NavbarController extends Controller
{
    /**
     * Show the home page.
     *
     * @return View - the home view.
     */
    public function home()
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
        $user = Auth::user();
        $hasOrder = false;
        $scroll = session()->has('scroll') ? true : false;
        if ($user)
            $order = $user->orders()->ofType('C')->unpurchased()->first();
        if ($user == null || $order == null)
            return view('layouts.catering.catering', compact('scroll', 'hasOrder'));

        $hasOrder = true;
        // If the user has one unpurchased order saved, get all orders.
        $orders = $order->getOrders();
        return view('layouts.catering.catering', compact('scroll', 'hasOrder', 'orders', 'order'));
        
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
        if ($user)
            $order = $user->orders()->ofType('R')->unpurchased()->first();
        
        if ($user == null || $order == null) 
            return view('layouts.reservations.reservations', compact('scroll', 'hasOrder')); 

        $hasOrder = true;
        // If the user has one unpurchased order saved, get all orders.
        $orders = $order->getOrders();
        return view('layouts.reservations.reservations', compact('scroll', 'hasOrder', 'orders', 'order'));
     
    }

     /**
     * Gets all orders of the user that have not been purchased to be displayed in the order checkout page.
     * @param Request $req - the HTTP request object.
     * @return View - if the user is not authenticated, redirects to the login page. 
     *                if the user has not added any orders yet, redirect to no orders yet
     *                Otherwise, returns the checkout page with all the products ordered and order data.
     */
    public function order()
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
            'orders' => $order->getOrders(),
            'order' => $order->toArray(),
        ]);
    }

}
