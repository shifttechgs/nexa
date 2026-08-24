<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort')->get()->groupBy('category');

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $related = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->orderBy('sort')
            ->take(3)
            ->get();

        return view('products.show', compact('product', 'related'));
    }
}
