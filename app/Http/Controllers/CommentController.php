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
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {   $comment = $request->validated();
        auth()->user()->comments()->create([
            'body' => $comment['body'],
            'post_id' => $comment['post_id'],
        ]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Comment $comment) // Not requied, will be implemented later
    // {
    //     return back();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Comment $comment) // Not requied, will be implemented later
    // {
    //     $comment->delete();
    //     return back();
    //
 }
