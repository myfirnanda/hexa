<?php

namespace App\Http\Controllers;

use App\Models\Project;

class WorkController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('pages.works.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('projectImages');
        return view('pages.works.show', compact('project'));
    }
}
