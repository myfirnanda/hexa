<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $testimonials = Testimonial::query()
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%")
                ->orWhere('quote', 'like', "%{$search}%"))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(15)
            ->withQueryString();
        return view('admin.testimonials.index', compact('testimonials', 'search'));
    }

    public function updateSort(Request $request)
    {
        $order = $request->input('order', []);
        foreach ($order as $index => $id) {
            Testimonial::where('id', (int) $id)->update(['sort_order' => $index]);
        }
        return response()->json(['ok' => true]);
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'role'     => 'required|string|max:255',
            'role_id'  => 'nullable|string|max:255',
            'quote'    => 'required|string',
            'quote_id' => 'nullable|string',
            'rating'   => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create($validated);

        return redirect()->route('manager.testimonials.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'role'     => 'required|string|max:255',
            'role_id'  => 'nullable|string|max:255',
            'quote'    => 'required|string',
            'quote_id' => 'nullable|string',
            'rating'   => 'required|integer|min:1|max:5',
        ]);

        $testimonial->update($validated);

        return redirect()->route('manager.testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('manager.testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}
