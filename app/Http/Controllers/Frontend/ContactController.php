<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\ContactMail;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index() {
        return view('frontend.contact');
    }

    public function send(Request $request) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('info@laravel-app.ge')->send(new ContactMail($data));

        Contact::create($data);

        return view('frontend.contact')->with('success', 1);
    }

    public function test() {
        $data = [
            'name' => 'Irakli',
            'age' => 22
        ];

        $testMail = new TestMail($data);

        Mail::to('natia@gmail.com')->send($testMail);

        print_r('ok');
    }
}
