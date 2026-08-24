<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::published()->latest('published_at')->take(3)->get();

        $featuredProducts = Product::all();

        $testimonials = Testimonial::published()->orderBy('sort')->get();

        return view('home', compact('latestPosts', 'featuredProducts', 'testimonials'));
    }
}
