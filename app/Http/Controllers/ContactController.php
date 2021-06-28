<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

/**
 *   Controller for the Contact Form
 * Contains two methods:
 * The first will render the contact form
 * The second vaildates the input and sends the email
*/

class ContactController extends Controller
{
    // Display contact form
    public function index() 
    {
        return view('contact');
    }

    // Validates contact form request
    public function validateContactRequest(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'msg' => 'required',
        ]);

        // Send Mail
        Mail::send('email',[
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg,
        ],
        // Headers
        function($msg) {
            $msg->from('admin@islandhomes.com');
            $msg->to('admin@islandhomes.com', 'Sander van der Windt')
            ->subject('Contact Form');
        }
    );
    // Return back with success message
    return view('contact')->with('success', 'Thank you for your message. We will be in touch shortly.');
    }
}