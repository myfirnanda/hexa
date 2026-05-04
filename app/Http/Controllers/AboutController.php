<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $testimonials = Testimonial::all();

        return view('pages.about', compact('clients', 'testimonials'));
    }
}
