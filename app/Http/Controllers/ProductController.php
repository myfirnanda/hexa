<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load(['images', 'features.items', 'benefits']);

        return view('pages.products.show', compact('product'));
    }
}
