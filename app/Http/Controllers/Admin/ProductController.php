<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
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
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $products = Product::withCount('features')
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%"))
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15)
            ->withQueryString();
        return view('admin.products.index', compact('products', 'search'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('sort_order')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name'     => 'required|string|max:255',
            'name'              => 'required|string|max:255',
            'description'       => 'nullable|string',
            'website_url'       => 'nullable|url|max:500',
            'image_cover'       => 'nullable|image|max:2048',
            'gallery_images.*'  => 'nullable|image|max:2048',
            'features'          => 'nullable|array',
            'features.*.icon'   => 'nullable|string|max:100',
            'features.*.title'  => 'nullable|string|max:255',
            'features.*.items'  => 'nullable|array',
            'features.*.items.*'=> 'nullable|string|max:500',
            'benefits'          => 'nullable|array',
            'benefits.*.icon'   => 'nullable|string|max:100',
            'benefits.*.title'  => 'nullable|string|max:255',
        ]);

        $category = ProductCategory::firstOrCreate(
            ['name' => trim($request->input('category_name'))],
            ['color' => '#0C5BED']
        );

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
                'product_category_id' => $category->id,
                'name'        => $validated['name'],
                'slug'        => $slug,
                'description' => $validated['description'] ?? null,
                'website_url' => $validated['website_url'] ?? null,
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
            return redirect()->route('manager.products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $product->load(['images', 'features.items', 'benefits']);
        $categories = ProductCategory::orderBy('sort_order')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_name'     => 'required|string|max:255',
            'name'              => 'required|string|max:255',
            'description'       => 'nullable|string',
            'website_url'       => 'nullable|url|max:500',
            'image_cover'       => 'nullable|image|max:2048',
            'gallery_images.*'  => 'nullable|image|max:2048',
            'delete_images'     => 'nullable|array',
            'delete_images.*'   => 'nullable|integer',
            'features'          => 'nullable|array',
            'features.*.icon'   => 'nullable|string|max:100',
            'features.*.title'  => 'nullable|string|max:255',
            'features.*.items'  => 'nullable|array',
            'features.*.items.*'=> 'nullable|string|max:500',
            'benefits'          => 'nullable|array',
            'benefits.*.icon'   => 'nullable|string|max:100',
            'benefits.*.title'  => 'nullable|string|max:255',
        ]);

        $category = ProductCategory::firstOrCreate(
            ['name' => trim($request->input('category_name'))],
            ['color' => '#0C5BED']
        );

        DB::beginTransaction();
        try {
            // Slug
            $updateData = [
                'product_category_id' => $category->id,
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'website_url' => $validated['website_url'] ?? null,
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
            return redirect()->route('manager.products.index')->with('success', 'Produk berhasil diperbarui.');
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
        return redirect()->route('manager.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function updateSort(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'required|integer|exists:products,id',
        ]);

        foreach ($validated['order'] as $index => $id) {
            Product::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
