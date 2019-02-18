<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function store(Request $post)
    {
        $post = Post::create(array_merge($post->all(), ['user_id' => \Auth::id()]));
        return response()->json($post);
    }
}