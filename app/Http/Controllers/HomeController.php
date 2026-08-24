<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::all()->take(3);

        $featuredProducts = Product::all();

        $testimonials = Testimonial::all();

        return view('home', compact('latestPosts', 'featuredProducts', 'testimonials'));
    }
}
