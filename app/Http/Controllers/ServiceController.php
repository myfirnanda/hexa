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

    public function show(Service $service)
    {
        $clients = Client::take(11)->get();

        return view('pages.services.show', compact('service', 'clients'));
    }
}
