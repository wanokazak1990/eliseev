<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;

class TestController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.main',compact('comments'));
    }

    public function getCommentForm()
    {
        return response()->json([
            'view'=>view('comments.form')->render(),
            'status'=>1
        ]);
    }

    public function addcomment(CommentRequest $request)
    {
        $fields = $request->only(['username','useremail','title','text']);
        $comment = Comment::create($fields);
        return response()->json([
            'view'=>view('comments.comment',compact('comment'))->render(),
            'status'=>1
        ]);
    }
}
