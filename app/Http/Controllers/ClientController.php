<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with(['projects' => function ($q) {
            $q->select('id', 'client_id');
        }])->get();
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

    public function works(Client $client)
    {
        $projects = $client->projects()->select(['id', 'name', 'slug', 'category', 'image', 'summary_title', 'client_id'])->get();

        return view('pages.clients.works', compact('client', 'projects'));
    }

    public function showWork(Client $client, Project $project)
    {
        abort_unless((int) $project->client_id === $client->id, 404);

        $project->load('projectImages', 'client');

        return view('pages.works.show', compact('project'));
    }
}
