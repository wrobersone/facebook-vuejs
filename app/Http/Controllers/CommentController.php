<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 'text' => 'required' ]);

        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->text = $request->input('text');
        $comment->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}