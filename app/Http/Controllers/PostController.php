<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StorePost;
use Illuminate\Http\Request;

class PostController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePost $request)
    { 
        $validatedData = $request->validated();
        if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('Posts Pictures', 'public');
    } else {$imagePath = null;
    }
        auth()->user()->posts()->create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'image' => $imagePath,
        ]);
        return redirect('/posts');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Not required, will be implemented later
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

}
