<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'summary_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
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
            $file->storeAs('projects', $filename, 'public');
            $validated['image'] = 'projects/' . $filename;
        }

        unset($validated['gallery_images']);
        $project = Project::create($validated);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $file) {
                $filename = Str::slug($validated['name']) . '-gallery-' . time() . '-' . $index . '.' . $file->getClientOriginalExtension();
                $file->storeAs('projects', $filename, 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => 'projects/' . $filename,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $project->load('projectImages');
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'summary_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'nullable|integer',
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
            // Delete old cover image from storage
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $file = $request->file('image');
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('projects', $filename, 'public');
            $validated['image'] = 'projects/' . $filename;
        }

        // Delete marked gallery images
        if (!empty($validated['delete_images'])) {
            $toDelete = ProjectImage::where('project_id', $project->id)
                ->whereIn('id', $validated['delete_images'])
                ->get();
            foreach ($toDelete as $img) {
                Storage::disk('public')->delete($img->image);
                $img->delete();
            }
        }

        unset($validated['gallery_images'], $validated['delete_images']);
        $project->update($validated);

        // Upload new gallery images
        if ($request->hasFile('gallery_images')) {
            $lastOrder = $project->projectImages()->max('sort_order') ?? -1;
            foreach ($request->file('gallery_images') as $index => $file) {
                $filename = Str::slug($project->name) . '-gallery-' . time() . '-' . $index . '.' . $file->getClientOriginalExtension();
                $file->storeAs('projects', $filename, 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => 'projects/' . $filename,
                    'sort_order' => $lastOrder + 1 + $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        // Delete gallery image files
        foreach ($project->projectImages as $img) {
            Storage::disk('public')->delete($img->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
