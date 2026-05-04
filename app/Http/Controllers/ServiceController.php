<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ServiceController extends Controller
{
    public function index()
    {
        return view('pages.services.index');
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
