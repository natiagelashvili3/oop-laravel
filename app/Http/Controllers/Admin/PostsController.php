<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminPostsRequest;
use App\Models\Post;

class PostsController extends Controller
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
        $post = Post::orderBy('id', 'DESC')->get();

        $data = [
            'posts' => $post
        ];

        return view('admin.posts.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostsRequest $request)
    {
        $title = $request->input('title');
        $text = $request->input('text');
        $short_text = $request->input('short_text');

        Post::create([
            'title' => $title,
            'text' => $text,
            'short_text' => $short_text
        ]);

        return redirect(route('admin.posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();

        $data = [
            'post' => $post
        ];

        return view('admin.posts.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPostsRequest $request)
    {
        $title = $request->input('title');
        $text = $request->input('text');
        $short_text = $request->input('short_text');
        $id = $request->input('id');

        Post::where('id', $id)->update([
            'title' => $title,
            'text' => $text,
            'short_text' => $short_text
        ]);

        return redirect(route('admin.posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('admin.posts'));
    }
}
