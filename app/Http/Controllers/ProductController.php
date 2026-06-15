<?php

namespace App\Http\Controllers;

use App\Models\PageBanner;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products   = Product::with('category')->orderBy('sort_order')->get();
        $heroBanner = PageBanner::active()->forPage('products')->orderBy('sort_order')->first();

        return view('pages.products.index', compact('products', 'heroBanner'));
    }

    public function show(Product $product)
    {
        $product->load(['images', 'features.items', 'benefits']);

        return view('pages.products.show', compact('product'));
    }
}
