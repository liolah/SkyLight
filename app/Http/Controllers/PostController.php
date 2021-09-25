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
        $this->middleware('can:update,post')->only('edit', 'update');
        $this->middleware('can:delete,post')->only('destroy');
    }
    
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function userPosts()
    {
        $posts = auth()->user()->posts()->latest()->paginate(5);
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
        $imagePath = 'storage/' . $request->file('image')->store('Posts Pictures', 'public');
        } else { $imagePath = null; }
        auth()->user()->posts()->create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'image' => $imagePath,
        ]);
        return redirect('user/posts');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(StorePost $request, Post $post)
    {
        $data = $request->validated();
        if(array_key_exists('image', $data)){
            $newImage = 'storage/' . $data['image']->store('Posts Pictures', 'public');
        } else {
            $newImage = $post->image;
        }
        $post->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $newImage,
        ]);
        return redirect('user/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

}
