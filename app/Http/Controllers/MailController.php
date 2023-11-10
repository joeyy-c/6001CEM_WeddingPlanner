<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Mail\ContactUsMail;

class MailController extends Controller
{
    public function send_email(Request $request) {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'messages' => $request->input('messages'),
            'website_name' => Config::get('mail.from.name')
        ];
    
        Mail::to(Config::get('mail.from.address'))->send(new ContactUsMail($data));
    
        return redirect()->back()->with('message', 'Email has been sent successfully.');
     }
}
