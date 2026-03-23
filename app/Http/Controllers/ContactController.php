<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        // Send email (you can configure this)
        Mail::raw(
            "New contact form message:\n\n" .
            "Name: {$formData['name']}\n" .
            "Email: {$formData['email']}\n\n" .
            "Message:\n{$formData['message']}",
            function ($mail) use ($formData) {
                $mail->to('240066404@aston.ac.uk')
                     ->subject('New Contact Form Submission');
            }
        );

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
