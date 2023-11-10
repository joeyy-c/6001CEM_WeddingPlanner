<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class MailController extends Controller
{
    public function send_email(Request $request) {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
    
        Mail::to($request->input('email'))->send(new ContactUsMail($data));
    
        return redirect()->back()->with('message', 'Email sent successfully!');

        // return redirect()->route('contact-us')->with('success', 'Message has been successfully sent.');
     }
}
