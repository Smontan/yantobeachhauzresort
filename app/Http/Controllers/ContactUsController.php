<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsFormRequest;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function send(Request $request)
    {   
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'message' => 'required|string'
        ]);
        
        $body = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
        ];

        Mail::to('yantobeachhauzresort@gmail.com')
            ->send(New ContactUs($body));

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Message sent successfully!');

        return redirect('/contact');
    }
}
 