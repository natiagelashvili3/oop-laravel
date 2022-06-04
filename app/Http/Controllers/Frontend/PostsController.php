<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class PostsController extends Controller
{

    public function index()
    {
        $data = [
            'posts' => Post::orderBy('id', 'desc')->paginate(12)
        ];

        return view('frontend.post.index')->with('data', $data);
    }
    
    public function view($slug, $id) {

        $post = Post::where('id', $id)->withCount('comments')->first();

        $data = [
            'post' => $post
        ];

        return view('frontend.post.view')->with('data', $data);
    }

    public function comment(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $post_id = $request->input('post_id');
        
        Comment::create([
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'post_id' => $post_id
        ]);

        return redirect()->back();

    }
}
