<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct()
    {
        // $this->middleware('test');
    }

    public function index() {
        return view('frontend.contact');
    }
}
