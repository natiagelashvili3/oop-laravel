<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index() {
        $data = [
            'posts' => Post::orderBy('id', 'desc')->get()
        ];

        return response()->json([
            'status' => 'OK',
            'data' => $data
        ]);
    }

    public function view(Request $request) {
        $post = Post::where('id', $request->input('id'))->withCount('comments')->first();

        $data = $post;

        return response()->json([
            'status' => $post ? 'OK' : "ERROR",
            'data' => $data
        ]);
        
    }
}
