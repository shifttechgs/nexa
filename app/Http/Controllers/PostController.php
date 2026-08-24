<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function show(string $post)
    {
        $post = Post::findBySlug($post);

        abort_unless($post, 404);

        return view('posts.show', compact('post'));
    }
}
