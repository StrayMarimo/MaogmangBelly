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
        return view('home');
    }


    /**
     * Show the catering page
     *
     * @return home view
     */
    public function catering()
    {
        return view('catering');
    }


    /**
     * Show the cintact us page
     *
     * @return home view
     */
    public function contact()
    {
        return view('contact');
    }


    /**
     * Show the home page
     *
     * @return home view
     */
    public function about()
    {
        return view('about');
    }
}
