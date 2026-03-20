<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('type', 'main')->get();
        $projects = Project::all();
        $clients = Client::all();
        $testimonials = Testimonial::all();

        return view('pages.home', compact('services', 'projects', 'clients', 'testimonials'));
    }
}
