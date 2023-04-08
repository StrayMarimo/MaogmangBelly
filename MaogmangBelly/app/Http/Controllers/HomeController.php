<?php

namespace App\Http\Controllers;

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
     * Show the home page
     *
     * @return home view
     */
    public function index()
    {
        return view('layouts.home.home');
    }


    /**
     * Show the catering page
     *
     * @return home view
     */
    public function catering()
    {
        return view('layouts.catering.catering');
    }


    /**
     * Show the cintact us page
     *
     * @return home view
     */
    public function contact()
    {
        return view('layouts.contact.contact');
    }


    /**
     * Show the home page
     *
     * @return home view
     */
    public function about()
    {
        return view('layouts.about.about');
    }
}
