<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function view($slug, $id) {

        $post = Post::where('id', $id)->first();

        $data = [
            'post' => $post
        ];

        return view('frontend.post.view')->with('data', $data);
    }
}
