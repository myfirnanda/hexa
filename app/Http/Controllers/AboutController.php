<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\TeamMember;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        $clients = Client::all();
        $testimonials = Testimonial::all();

        return view('pages.about', compact('teamMembers', 'clients', 'testimonials'));
    }
}
