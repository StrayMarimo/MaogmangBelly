<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    function showMap() {
        return view('layouts.checkout.map');
    }

}
