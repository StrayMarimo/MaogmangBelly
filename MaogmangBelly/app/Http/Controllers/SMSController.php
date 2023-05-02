<?php

namespace App\Http\Controllers;

use App\Models\SMS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SMSController extends Controller
{
    public function index(Request $req)
    {
        $path = $req->fullUrl();
        $code = substr($path, 40);
        $appdata = SMS::where('id', 1)->get();
        $response = Http::withUrlParameters([
            'endpoint' => 'https://developer.globelabs.com.ph/oauth/access_token?',
            'id' => 'pn6xFapraoIx5cq5eATrkKIX9nybF5pd',
            'secret' => '08254a6cf4e9e4fae89e6f2e967b5230ab0f18be5075cc9e7417c4b32aa530a4',
            'code' => $code,
        ])->post('{+endpoint}app_id={id}&app_secret={secret}&code={code}');
        $user = User::latest()->first();
        $user->mobile_number = $response->json('subscriber_number');
        $user->access_token = $response->json('access_token');
        $user->save();

        return redirect('/');
    }
}
