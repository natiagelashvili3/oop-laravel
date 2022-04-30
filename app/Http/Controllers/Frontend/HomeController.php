<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Slide;

class HomeController extends Controller
{
    public function index() {

        // Create Slide version 1
        // Slide::create(
        //     [
        //         'title' => 'new slide',
        //         'short_text'  => 'new slide short_text',
        //         'image' => 'path/asdsa/asda',
        //         'header_title' => 'welcome'
        //     ]            
        // );

        // Create Slide Version 2
        // $slide = new Slide;

        // $slide->title = 'new slide 1';
        // $slide->short_text = 'asda';
        // $slide->image = 'paths';
        // $slide->header_title = 'asdas';

        // $slide->save();


        // Get Slide By id
        //$slide = Slide::find(3);

        // Get By Where Query
        // $slide = Slide::where('id', '=', 3)->first();

        // Get All
        // $slide = Slide::all();


        // Update Slide Version 1
        // $slide = Slide::find(3);
        // $slide->title = 'Paris to London';
        // $slide->save();

        // Update Slide Version 2
        // Slide::where('id', '=', 3)->update([
        //     'title' => 'update versoin title'
        // ]);


        // Delete
        // Slide::destroy(4);

        $slides = Slide::all();

        $data = [
            'slides' => $slides
        ];

        return view('frontend.home', ['data' => $data]);
    }
}
