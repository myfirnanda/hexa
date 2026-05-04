<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Project;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $clients = Client::all();
        $testimonials = Testimonial::where('rating', 5)->latest()->get();
        $products = Product::orderBy('sort_order')->get();

        return view('pages.home', compact('projects', 'clients', 'testimonials', 'products'));
    }
}
