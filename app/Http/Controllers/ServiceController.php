<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $mainServices = Service::where('type', 'main')->get();
        $additionalServices = Service::where('type', 'additional')->get();

        return view('pages.services.index', compact('mainServices', 'additionalServices'));
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
        $clients = Client::all();
        return view('pages.services.service-managed-service', compact('clients'));
    }
}
