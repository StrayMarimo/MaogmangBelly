<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('layouts.catering.catering');
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
        return view('layouts.reservations.reservations');
    }

}
