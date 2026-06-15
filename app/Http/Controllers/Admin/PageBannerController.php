<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageBannerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $page   = $request->input('page_filter', '');

        $banners = PageBanner::when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->when($page, fn($q) => $q->where('page', $page))
            ->orderBy('page')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.banners.index', compact('banners', 'search', 'page'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page'             => 'required|string|in:' . implode(',', array_keys(PageBanner::$pages)),
            'title'            => 'nullable|string|max:255',
            'hero_title'       => 'nullable|string|max:500',
            'hero_description' => 'nullable|string|max:1000',
            'button_text'      => 'nullable|string|max:100',
            'button_url'       => 'nullable|string|max:500',
            'image'            => 'required|image|max:4096',
            'image_position'   => 'nullable|string|max:30',
            'is_active'        => 'nullable|boolean',
        ]);

        $file     = $request->file('image');
        $filename = 'banner_' . $validated['page'] . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('banners', $filename, 'public');

        $maxOrder = PageBanner::where('page', $validated['page'])->max('sort_order') ?? -1;

        PageBanner::create([
            'page'             => $validated['page'],
            'title'            => $validated['title'] ?? null,
            'hero_title'       => $validated['hero_title'] ?? null,
            'hero_description' => $validated['hero_description'] ?? null,
            'button_text'      => $validated['button_text'] ?? null,
            'button_url'       => $validated['button_url'] ?? null,
            'image_path'       => 'banners/' . $filename,
            'image_position'   => $validated['image_position'] ?? 'center',
            'sort_order'       => $maxOrder + 1,
            'is_active'        => $request->boolean('is_active', true),
        ]);

        return redirect()->route('manager.banners.index', ['page_filter' => $validated['page']])
            ->with('success', 'Banner berhasil ditambahkan.');
    }

    public function edit(PageBanner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, PageBanner $banner)
    {
        $validated = $request->validate([
            'page'             => 'required|string|in:' . implode(',', array_keys(PageBanner::$pages)),
            'title'            => 'nullable|string|max:255',
            'hero_title'       => 'nullable|string|max:500',
            'hero_description' => 'nullable|string|max:1000',
            'button_text'      => 'nullable|string|max:100',
            'button_url'       => 'nullable|string|max:500',
            'image'            => 'nullable|image|max:4096',
            'image_position'   => 'nullable|string|max:30',
            'is_active'        => 'nullable|boolean',
        ]);

        $data = [
            'page'             => $validated['page'],
            'title'            => $validated['title'] ?? null,
            'hero_title'       => $validated['hero_title'] ?? null,
            'hero_description' => $validated['hero_description'] ?? null,
            'button_text'      => $validated['button_text'] ?? null,
            'button_url'       => $validated['button_url'] ?? null,
            'image_position'   => $validated['image_position'] ?? 'center',
            'is_active'        => $request->boolean('is_active', false),
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($banner->image_path);
            $file     = $request->file('image');
            $filename = 'banner_' . $validated['page'] . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('banners', $filename, 'public');
            $data['image_path'] = 'banners/' . $filename;
        }

        $banner->update($data);

        return redirect()->route('manager.banners.index', ['page_filter' => $banner->page])
            ->with('success', 'Banner berhasil diperbarui.');
    }

    public function destroy(PageBanner $banner)
    {
        Storage::disk('public')->delete($banner->image_path);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner berhasil dihapus.');
    }

    public function toggleActive(PageBanner $banner)
    {
        $banner->update(['is_active' => !$banner->is_active]);
        return response()->json(['is_active' => $banner->is_active]);
    }

    public function sort(Request $request)
    {
        $validated = $request->validate([
            'order'   => 'required|array',
            'order.*' => 'required|integer|exists:page_banners,id',
        ]);

        foreach ($validated['order'] as $index => $id) {
            PageBanner::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
