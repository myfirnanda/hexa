<?php

namespace App\Http\Controllers;

use App\Models\PageBanner;
use App\Models\Project;

class WorkController extends Controller
{
    public function index()
    {
        $projects    = Project::select(['id', 'name', 'slug', 'category', 'image', 'summary_title'])
            ->orderBy('id')
            ->get();
        $heroBanner  = PageBanner::active()->forPage('works')->orderBy('sort_order')->first();

        return view('pages.works.index', compact('projects', 'heroBanner'));
    }

    public function show(Project $project)
    {
        $project->load('projectImages');
        return view('pages.works.show', compact('project'));
    }
}
