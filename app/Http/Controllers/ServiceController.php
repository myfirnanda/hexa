<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PageBanner;

class ServiceController extends Controller
{
    public function index()
    {
        $heroBanner = PageBanner::active()->forPage('services')->orderBy('sort_order')->first();
        return view('pages.services.index', compact('heroBanner'));
    }

    // public function show(Service $service)
    // {
    //     $clients = Client::take(11)->get();

    //     return view('pages.services.show', compact('service', 'clients'));
    // }

    public function softwareDevelopment() {
        return view('pages.services.service-software-development');
    }

    public function startupIncubator() {
        return view('pages.services.service-startup-incubator');
    }

    public function managedService() {
        $clients = Client::orderBy('sort_order')->orderBy('id')->get();
        return view('pages.services.service-managed-service', compact('clients'));
    }
}
