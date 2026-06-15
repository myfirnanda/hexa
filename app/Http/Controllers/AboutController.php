<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PageBanner;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $clients      = Client::orderBy('sort_order')->orderBy('id')->get();
        $testimonials = Testimonial::orderBy('sort_order')->orderBy('id')->get();
        $heroBanner   = PageBanner::active()->forPage('about')->orderBy('sort_order')->first();

        return view('pages.about', compact('clients', 'testimonials', 'heroBanner'));
    }
}
