<?php

namespace App\Http\Controllers;

use App\Models\Project;

class WorkController extends Controller
{
    public function index()
    {
        $projects = Project::select(['id', 'name', 'slug', 'category', 'image', 'summary_title'])
            ->orderBy('id')
            ->get();

        return view('pages.works.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('projectImages');
        return view('pages.works.show', compact('project'));
    }
}
