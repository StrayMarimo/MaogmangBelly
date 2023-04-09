<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewsLetter;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $req)
    {
        $mailData = [
            'title' => 'Mail from Maogmang Belly',
            'body' => "Thank you for subscribing to our newsletter. We'll keep you up to date on our business."
        ];

        Mail::to($req->email_newsletter)->send(new NewsLetter($mailData));

        return redirect('/');
    }
}
