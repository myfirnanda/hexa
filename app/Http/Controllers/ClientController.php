<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $categories = [
            'education'  => 'Education & Academia',
            'government' => 'Government & Public Sector',
            'soe'        => 'SOE & Energy',
            'finance'    => 'Banking & Finance',
            'industrial' => 'Industrial & FMCG',
            'retail'     => 'Retail & Lifestyle',
        ];

        return view('pages.clients', compact('clients', 'categories'));
    }
}
