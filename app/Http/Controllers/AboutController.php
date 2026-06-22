<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PageBanner;
use App\Models\Project;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $clients      = Client::orderBy('sort_order')->orderBy('id')->get();
        $testimonials = Testimonial::orderBy('sort_order')->orderBy('id')->get();
        $heroBanner   = PageBanner::active()->forPage('about')->orderBy('sort_order')->first();
        $projects = Project::whereNotNull('about_sort_order')->orderBy('about_sort_order')->take(6)->get();
        if ($projects->isEmpty()) {
            $projects = Project::orderBy('sort_order')->orderBy('id')->take(6)->get();
        }

        return view('pages.about', compact('clients', 'testimonials', 'heroBanner', 'projects'));
    }
}
