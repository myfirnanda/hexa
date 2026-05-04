<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->get();

        return view('pages.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load(['images', 'features.items', 'benefits']);

        return view('pages.products.show', compact('product'));
    }
}
