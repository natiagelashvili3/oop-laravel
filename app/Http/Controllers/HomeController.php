<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $data = [
            'title' => 'Home Page',
            'text'  => 'Home page text'
        ];

        return view('frontend.home', ['data' => $data]);
    }
}
