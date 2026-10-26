<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Region;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::all()->take(3);

        $featuredProducts = Product::featured()->take(4);

        $testimonials = Testimonial::all();

        $regions = Region::all();

        return view('home', compact('latestPosts', 'featuredProducts', 'testimonials', 'regions'));
    }
}
