<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductFeature;
use App\Models\ProductFeatureItem;
use App\Models\ProductBenefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'description'       => 'nullable|string',
            'image_cover'       => 'nullable|image|max:2048',
            'gallery_images.*'  => 'nullable|image|max:2048',
            'features'          => ['required', 'array', function ($attribute, $value, $fail) {
                $count = is_array($value) ? count($value) : 0;
                if ($count !== 3 && $count !== 6) {
                    $fail('Jumlah features harus 3 atau 6.');
                }
            }],
            'features.*.icon'   => 'nullable|string|max:100',
            'features.*.title'  => 'required|string|max:255',
            'features.*.items'  => 'required|array|min:3|max:3',
            'features.*.items.*'=> 'required|string|max:500',
            'benefits'          => 'required|array|min:4|max:4',
            'benefits.*.icon'   => 'nullable|string|max:100',
            'benefits.*.title'  => 'required|string|max:255',
        ], [
            'features.required'           => 'Jumlah features harus 3 atau 6.',
            'features.*.title.required'   => 'Judul feature wajib diisi.',
            'features.*.items.required'   => 'Setiap feature harus memiliki tepat 3 items.',
            'features.*.items.min'        => 'Setiap feature harus memiliki tepat :min items.',
            'features.*.items.max'        => 'Setiap feature harus memiliki tepat :max items.',
            'features.*.items.*.required' => 'Teks item tidak boleh kosong.',
            'benefits.required'           => 'Harus ada tepat 4 benefits.',
            'benefits.min'                => 'Harus ada tepat :min benefits.',
            'benefits.max'                => 'Harus ada tepat :max benefits.',
            'benefits.*.title.required'   => 'Judul benefit wajib diisi.',
        ]);

        $slug = Str::slug($validated['name']);
        $original = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter++;
        }

        DB::beginTransaction();
        try {
            // Upload cover
            $coverPath = null;
            if ($request->hasFile('image_cover')) {
                $file = $request->file('image_cover');
                $filename = $slug . '-cover-' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('products', $filename, 'public');
                $coverPath = 'products/' . $filename;
            }

            $product = Product::create([
                'name'        => $validated['name'],
                'slug'        => $slug,
                'description' => $validated['description'] ?? null,
                'image_cover' => $coverPath,
            ]);

            // Gallery images
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $index => $file) {
                    $filename = $slug . '-gallery-' . time() . '-' . $index . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('products', $filename, 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => 'products/' . $filename,
                        'sort_order' => $index,
                    ]);
                }
            }

            // Features + items
            if (!empty($validated['features'])) {
                foreach ($validated['features'] as $fi => $featureData) {
                    if (empty($featureData['title'])) continue;
                    $feature = ProductFeature::create([
                        'product_id' => $product->id,
                        'icon'       => $featureData['icon'] ?? null,
                        'title'      => $featureData['title'],
                        'sort_order' => $fi,
                    ]);
                    if (!empty($featureData['items'])) {
                        foreach ($featureData['items'] as $ii => $text) {
                            if (empty(trim($text))) continue;
                            ProductFeatureItem::create([
                                'feature_id' => $feature->id,
                                'text'       => $text,
                                'sort_order' => $ii,
                            ]);
                        }
                    }
                }
            }

            // Benefits
            if (!empty($validated['benefits'])) {
                foreach ($validated['benefits'] as $bi => $benefitData) {
                    if (empty($benefitData['title'])) continue;
                    ProductBenefit::create([
                        'product_id' => $product->id,
                        'icon'       => $benefitData['icon'] ?? null,
                        'title'      => $benefitData['title'],
                        'sort_order' => $bi,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $product->load(['images', 'features.items', 'benefits']);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'description'       => 'nullable|string',
            'image_cover'       => 'nullable|image|max:2048',
            'gallery_images.*'  => 'nullable|image|max:2048',
            'delete_images'     => 'nullable|array',
            'delete_images.*'   => 'nullable|integer',
            'features'          => ['required', 'array', function ($attribute, $value, $fail) {
                $count = is_array($value) ? count($value) : 0;
                if ($count !== 3 && $count !== 6) {
                    $fail('Jumlah features harus 3 atau 6.');
                }
            }],
            'features.*.icon'   => 'nullable|string|max:100',
            'features.*.title'  => 'required|string|max:255',
            'features.*.items'  => 'required|array|min:3|max:3',
            'features.*.items.*'=> 'required|string|max:500',
            'benefits'          => 'required|array|min:4|max:4',
            'benefits.*.icon'   => 'nullable|string|max:100',
            'benefits.*.title'  => 'required|string|max:255',
        ], [
            'features.required'           => 'Jumlah features harus 3 atau 6.',
            'features.*.title.required'   => 'Judul feature wajib diisi.',
            'features.*.items.required'   => 'Setiap feature harus memiliki tepat 3 items.',
            'features.*.items.min'        => 'Setiap feature harus memiliki tepat :min items.',
            'features.*.items.max'        => 'Setiap feature harus memiliki tepat :max items.',
            'features.*.items.*.required' => 'Teks item tidak boleh kosong.',
            'benefits.required'           => 'Harus ada tepat 4 benefits.',
            'benefits.min'                => 'Harus ada tepat :min benefits.',
            'benefits.max'                => 'Harus ada tepat :max benefits.',
            'benefits.*.title.required'   => 'Judul benefit wajib diisi.',
        ]);

        DB::beginTransaction();
        try {
            // Slug
            $updateData = [
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
            ];

            if ($validated['name'] !== $product->name) {
                $slug = Str::slug($validated['name']);
                $original = $slug;
                $counter = 1;
                while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                    $slug = $original . '-' . $counter++;
                }
                $updateData['slug'] = $slug;
            }

            // Cover image
            if ($request->hasFile('image_cover')) {
                if ($product->image_cover) {
                    Storage::disk('public')->delete($product->image_cover);
                }
                $file = $request->file('image_cover');
                $filename = ($updateData['slug'] ?? $product->slug) . '-cover-' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('products', $filename, 'public');
                $updateData['image_cover'] = 'products/' . $filename;
            }

            $product->update($updateData);

            // Delete marked gallery images
            if (!empty($validated['delete_images'])) {
                $toDelete = ProductImage::where('product_id', $product->id)
                    ->whereIn('id', $validated['delete_images'])
                    ->get();
                foreach ($toDelete as $img) {
                    Storage::disk('public')->delete($img->image_path);
                    $img->delete();
                }
            }

            // Upload new gallery images
            if ($request->hasFile('gallery_images')) {
                $lastOrder = $product->images()->max('sort_order') ?? -1;
                foreach ($request->file('gallery_images') as $index => $file) {
                    $filename = $product->slug . '-gallery-' . time() . '-' . $index . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('products', $filename, 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => 'products/' . $filename,
                        'sort_order' => $lastOrder + 1 + $index,
                    ]);
                }
            }

            // Sync features: delete old, insert new
            $product->features()->each(function ($feature) {
                $feature->items()->delete();
                $feature->delete();
            });
            if (!empty($validated['features'])) {
                foreach ($validated['features'] as $fi => $featureData) {
                    if (empty($featureData['title'])) continue;
                    $feature = ProductFeature::create([
                        'product_id' => $product->id,
                        'icon'       => $featureData['icon'] ?? null,
                        'title'      => $featureData['title'],
                        'sort_order' => $fi,
                    ]);
                    if (!empty($featureData['items'])) {
                        foreach ($featureData['items'] as $ii => $text) {
                            if (empty(trim($text))) continue;
                            ProductFeatureItem::create([
                                'feature_id' => $feature->id,
                                'text'       => $text,
                                'sort_order' => $ii,
                            ]);
                        }
                    }
                }
            }

            // Sync benefits
            $product->benefits()->delete();
            if (!empty($validated['benefits'])) {
                foreach ($validated['benefits'] as $bi => $benefitData) {
                    if (empty($benefitData['title'])) continue;
                    ProductBenefit::create([
                        'product_id' => $product->id,
                        'icon'       => $benefitData['icon'] ?? null,
                        'title'      => $benefitData['title'],
                        'sort_order' => $bi,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        // Delete cover
        if ($product->image_cover) {
            Storage::disk('public')->delete($product->image_cover);
        }
        // Delete gallery images
        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
