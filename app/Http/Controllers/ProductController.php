<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = $products->countBy('category');

        // ?category= deep-links from the home page; unknown values fall back to "All"
        $activeCategory = $categories->has($request->query('category')) ? $request->query('category') : 'All';

        return view('products.index', compact('products', 'categories', 'activeCategory'));
    }

    public function show(string $product)
    {
        $product = Product::findBySlug($product);

        abort_unless($product, 404);

        $related = Product::all()
            ->where('category', $product->category)
            ->reject(fn (Product $item) => $item->slug === $product->slug)
            ->take(4);

        return view('products.show', compact('product', 'related'));
    }
}
