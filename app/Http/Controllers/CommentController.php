<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;

class CommentController extends Controller
{
	public function index()
    {
        return Comment::all();
    }
    
    public function show($id)
    {
        return Comment::find($id);
    }

    public function store(Request $comment)
    {
        $comment = Comment::create(array_merge($comment->all(), ['user_id' => \Auth::id()]));
        return response()->json($comment);
    }
}
