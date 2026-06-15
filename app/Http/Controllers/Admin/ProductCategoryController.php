<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $categories = ProductCategory::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('sort_order')
            ->paginate(20)
            ->withQueryString();
        return view('admin.product-categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('admin.product-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255|unique:product_categories',
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ], [
            'name.unique' => 'Kategori dengan nama ini sudah ada.',
            'color.regex' => 'Warna harus format hex (#000000).',
        ]);

        ProductCategory::create($validated);
        return redirect()->route('manager.product-categories.index')->with('success', 'Kategori produk berhasil ditambahkan.');
    }

    public function edit(ProductCategory $category)
    {
        return view('admin.product-categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255|unique:product_categories,name,' . $category->id,
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ], [
            'name.unique' => 'Kategori dengan nama ini sudah ada.',
            'color.regex' => 'Warna harus format hex (#000000).',
        ]);

        $category->update($validated);
        return redirect()->route('manager.product-categories.index')->with('success', 'Kategori produk berhasil diperbarui.');
    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();
        return redirect()->route('manager.product-categories.index')->with('success', 'Kategori produk berhasil dihapus.');
    }

    public function updateSort(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'required|integer|exists:product_categories,id',
        ]);

        foreach ($validated['order'] as $index => $id) {
            ProductCategory::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
