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
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Maogmang Belly',
            'body' => 'This is for testing email using smtp.'
        ];

        // temp fix: get user email
        Mail::to('basbasangheline@gmail.com')->send(new NewsLetter($mailData));

        dd("Email is sent successfully.");
    }
}
