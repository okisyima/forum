<?php

namespace App\Http\Controllers;

use App\Comment;
use App\forum;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request, Forum $forum)
    {
        $request->validate([
            'content'   => 'required|min:5'
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;

        $forum->comments()->save($comment);

        return back()->withKabar('Komentar Terkirim');
    }

    public function replyComment(Request $request, Comment $comment)
    {
        $request->validate([
            'content'   => 'required|min:5'
        ]);

        $reply = new Comment;
        $reply->user_id = Auth::user()->id;
        $reply->content = $request->content;

        $comment->comments()->save($reply);

        return back()->withKabar('Komentar balasan Terkirim.');
    }
}
