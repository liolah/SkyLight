<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:update,comment')->only('update');
        $this->middleware('can:delete,comment')->only('destroy');
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request, $post)
    {   $comment = $request->validated();
        auth()->user()->comments()->create([
            'body' => $comment['body'],
            'post_id' => $post,
        ]);
        return redirect('posts/' . $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComment $request, Comment $comment) 
    {
        $data = $request->validated();
        $comment->update([
            'body' => $data['body']
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
    }
