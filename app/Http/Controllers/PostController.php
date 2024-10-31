<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Add a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id, // Use the authenticated user ID
        ]);

        return response()->json(['post' => $post], 201);
    }

    // Get a list of all posts
    public function index()
    {
        $posts = Post::all();
        return response()->json(['posts' => $posts]);
    }
}
