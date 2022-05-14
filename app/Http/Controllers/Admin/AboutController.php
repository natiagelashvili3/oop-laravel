<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\AdminAboutRequest;

class AboutController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();

        return view('admin.about.index')->with('data', ['about' => $about]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminAboutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(AdminAboutRequest $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'short_text' => 'required',
        //     'text' => 'required'
        // ], [
        //     'title.required' => 'გთხოვთ მიუთითოთ სათაური1'
        // ]);

        $title = $request->title;
        $short_text = $request->short_text;
        $text = $request->text;

        About::first()->update([
            'title' => $title,
            'short_text' => $short_text,
            'text' => $text
        ]);

        return redirect()->route('admin.about');
    }
}
