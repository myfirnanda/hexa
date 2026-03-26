<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'hero_description' => 'nullable|string',
            'summary_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $counter = 1;
        $original = $validated['slug'];
        while (Project::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $original . '-' . $counter++;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $filename);
            $validated['image'] = $filename;
        }

        unset($validated['image_file']);
        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'hero_description' => 'nullable|string',
            'summary_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'nullable|string',
        ]);

        if ($validated['name'] !== $project->name) {
            $validated['slug'] = Str::slug($validated['name']);
            $counter = 1;
            $original = $validated['slug'];
            while (Project::where('slug', $validated['slug'])->where('id', '!=', $project->id)->exists()) {
                $validated['slug'] = $original . '-' . $counter++;
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $filename);
            $validated['image'] = $filename;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
