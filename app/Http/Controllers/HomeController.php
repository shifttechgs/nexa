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

        $featuredProducts = Product::orderBy('sort')->get()
            ->groupBy('category')
            ->map(fn ($items) => $items->first())
            ->values()
            ->take(4);

        $testimonials = Testimonial::published()->orderBy('sort')->get();

        return view('home', compact('latestPosts', 'featuredProducts', 'testimonials'));
    }
}
