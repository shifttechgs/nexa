<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->groupBy('category');

        return view('products.index', compact('products'));
    }

    public function show(string $product)
    {
        $product = Product::findBySlug($product);

        abort_unless($product, 404);

        $related = Product::all()
            ->where('category', $product->category)
            ->reject(fn (Product $item) => $item->slug === $product->slug)
            ->take(3);

        return view('products.show', compact('product', 'related'));
    }
}
