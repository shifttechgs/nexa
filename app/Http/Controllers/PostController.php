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

        $more = Post::all()
            ->reject(fn (Post $item) => $item->slug === $post->slug)
            ->take(3);

        return view('posts.show', compact('post', 'more'));
    }
}
