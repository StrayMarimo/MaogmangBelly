<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetter;
use App\Mail\ContactUs;

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

    public function contact(Request $req)
    {
        $mailData = [
            'name' => $req->name_user,
            'email' => $req->email_user,
            'number' => $req->number_user,
            'message' => $req->message_user
        ];

        Mail::to('maogmangbelly@gmail.com')->send(new ContactUs($mailData));

        return redirect('/contact');
    }
}
