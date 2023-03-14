<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     *    Verifies user login credentials
     *    @param Request $req
     *    @return response
     */

    function login(Request $req)
    {
        // get user from inputted email
        $user = User::where(['email' => $req->email])->first();

        // if user does not exist or password is incorrect
        if (!$user || !Hash::check($req->password, $user->password)) {
            return "Username or password is not matched";
        } else {
            // else login user and go back to home page
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }
}
