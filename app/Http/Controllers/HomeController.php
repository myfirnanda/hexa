<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PageBanner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $projects    = Project::orderBy('sort_order')->orderBy('id')->get();
        $clients     = Client::orderBy('sort_order')->orderBy('id')->get();
        $testimonials = Testimonial::where('rating', 5)->orderBy('sort_order')->orderBy('id')->get();
        $products    = Product::with('category')->orderBy('sort_order')->get();
        $heroBanner  = PageBanner::active()->forPage('home')->inRandomOrder()->first();

        return view('pages.home', compact('projects', 'clients', 'testimonials', 'products', 'heroBanner'));
    }
}
