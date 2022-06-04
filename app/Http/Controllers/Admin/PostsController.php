<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminPostsRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;

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
        $post = Post::orderBy('id', 'DESC')->paginate(10);

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
        $data = [
            'categories' => Category::all() ,
            'tags' => Tag::all()
        ];

        return view('admin.posts.create')->with('data', $data);
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
        $slug = Str::slug($title);
        $category_id = $request->input('category_id');
        $tags_id = $request->input('tag_id');

        $data = [
            'title' => $title,
            'text' => $text,
            'short_text' => $short_text,
            'slug' => $slug,
            'category_id' => $category_id
        ];

        if($request->has('image') && $request->file('image') != null) {
            $image = $request->file('image');

            $name = str_replace(' ', '_', $title) . '_' . time() . '.' . $image->getClientOriginalExtension();

            $folderName = 'public/images/';

            $image->storeAs($folderName, $name);

            $data['image'] = $name;
        }

        $post = Post::create($data);
        
        if($tags_id) {
            $post->tags()->sync($tags_id);
        }

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
        
        // dd($post->tags()->allRelatedIds()->toArray());

        $data = [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
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
        $category_id = $request->input('category_id');
        $slug = Str::slug($title);

        $post = Post::find($id);

        $post->update([
            'title' => $title,
            'text' => $text,
            'short_text' => $short_text,
            'slug' => $slug,
            'category_id' => $category_id
        ]);

        if($request->has('image') && $request->file('image') != null) {
            $image = $request->file('image');

            $name = str_replace(' ', '_', $title) . '_' . time() . '.' . $image->getClientOriginalExtension();

            $folderName = 'public/images/';

            $image->storeAs($folderName, $name);

            $post->update([
                'image' => $name
            ]);

        }

        if($request->input('tag_id')) {
            $post->tags()->sync($request->input('tag_id'));
        }

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
