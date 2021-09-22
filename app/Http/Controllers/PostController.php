<?php

namespace App\Http\Controllers;

use App\Post;
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

    public function store(Request $request)
    {  $data->title = $request->input('title');
        dd($data);
    // $post->title = $request->input('title');
    //     $post->body = $request->input('body');
    //     auth()->user()->post->create($request->all());
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
        //
    }

    public function destroy(Post $post)
    {
        $post->delete();
        // return redirect('/posts');
        return back();
    }

    protected function validatePost(){
        return tap($request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]) ,  function () {
                if($request->hasFile('image')){
                    $request->validate([
                        'image' => ['required', 'image', 'max:3000'],
                    ]);
                }

        }


    );}
}
