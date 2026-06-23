<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StartProjectController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\PageBannerController as AdminPageBannerController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/software-development', [ServiceController::class, 'softwareDevelopment'])->name('services.software-development');
Route::get('/services/startup-incubator', [ServiceController::class, 'startupIncubator'])->name('services.startup-incubator');
Route::get('/services/managed-service', [ServiceController::class, 'managedService'])->name('services.managedService');
Route::get('/works', [WorkController::class, 'index'])->name('works.index');
Route::get('/works/{project}', [WorkController::class, 'show'])->name('works.show');
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/clients/{client}/works', [ClientController::class, 'works'])->name('clients.works');
Route::get('/clients/{client}/works/{project}', [ClientController::class, 'showWork'])->name('clients.works.show');
Route::get('/start-project', [StartProjectController::class, 'index'])->name('start-project');
Route::post('/start-project/submit', [OrderController::class, 'store'])->name('start-project.submit');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/manager', [AdminController::class, 'dashboard'])->name('manager.dashboard');

    // Orders
    Route::get('/manager/orders', [AdminOrderController::class, 'index'])->name('manager.orders.index');
    Route::get('/manager/orders/{order}', [AdminOrderController::class, 'show'])->name('manager.orders.show');
    Route::patch('/manager/orders/{order}/status/{status}', [AdminOrderController::class, 'updateStatus'])->name('manager.orders.status');
    Route::delete('/manager/orders/{order}', [AdminOrderController::class, 'destroy'])->name('manager.orders.destroy');

    // Projects
    Route::get('/manager/projects', [AdminProjectController::class, 'index'])->name('manager.projects.index');
    Route::get('/manager/projects/create', [AdminProjectController::class, 'create'])->name('manager.projects.create');
    Route::post('/manager/projects', [AdminProjectController::class, 'store'])->name('manager.projects.store');
    Route::get('/manager/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('manager.projects.edit');
    Route::put('/manager/projects/{project}', [AdminProjectController::class, 'update'])->name('manager.projects.update');
    Route::delete('/manager/projects/{project}', [AdminProjectController::class, 'destroy'])->name('manager.projects.destroy');
    Route::post('/manager/projects/sort', [AdminProjectController::class, 'updateSort'])->name('manager.projects.sort');
    Route::post('/manager/projects/about-sort', [AdminProjectController::class, 'updateAboutSort'])->name('manager.projects.about-sort');

    // Clients
    Route::get('/manager/clients', [AdminClientController::class, 'index'])->name('manager.clients.index');
    Route::get('/manager/clients/create', [AdminClientController::class, 'create'])->name('manager.clients.create');
    Route::post('/manager/clients', [AdminClientController::class, 'store'])->name('manager.clients.store');
    Route::put('/manager/clients/{client}', [AdminClientController::class, 'update'])->name('manager.clients.update');
    Route::delete('/manager/clients/{client}', [AdminClientController::class, 'destroy'])->name('manager.clients.destroy');
    Route::post('/manager/clients/sort', [AdminClientController::class, 'updateSort'])->name('manager.clients.sort');

    // CKEditor image upload
    Route::post('/manager/upload-image', [App\Http\Controllers\Admin\UploadController::class, 'image'])->name('manager.upload.image');

    // Testimonials
    Route::get('/manager/testimonials', [AdminTestimonialController::class, 'index'])->name('manager.testimonials.index');
    Route::get('/manager/testimonials/create', [AdminTestimonialController::class, 'create'])->name('manager.testimonials.create');
    Route::post('/manager/testimonials', [AdminTestimonialController::class, 'store'])->name('manager.testimonials.store');
    Route::get('/manager/testimonials/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('manager.testimonials.edit');
    Route::put('/manager/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('manager.testimonials.update');
    Route::delete('/manager/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('manager.testimonials.destroy');
    Route::post('/manager/testimonials/sort', [AdminTestimonialController::class, 'updateSort'])->name('manager.testimonials.sort');

    // Product Categories
    Route::get('/manager/product-categories', [AdminProductCategoryController::class, 'index'])->name('manager.product-categories.index');
    Route::get('/manager/product-categories/create', [AdminProductCategoryController::class, 'create'])->name('manager.product-categories.create');
    Route::post('/manager/product-categories', [AdminProductCategoryController::class, 'store'])->name('manager.product-categories.store');
    Route::get('/manager/product-categories/{category}/edit', [AdminProductCategoryController::class, 'edit'])->name('manager.product-categories.edit');
    Route::put('/manager/product-categories/{category}', [AdminProductCategoryController::class, 'update'])->name('manager.product-categories.update');
    Route::delete('/manager/product-categories/{category}', [AdminProductCategoryController::class, 'destroy'])->name('manager.product-categories.destroy');
    Route::post('/manager/product-categories/sort', [AdminProductCategoryController::class, 'updateSort'])->name('manager.product-categories.sort');

    // Products (Produk)
    Route::get('/manager/products', [AdminProductController::class, 'index'])->name('manager.products.index');
    Route::get('/manager/products/create', [AdminProductController::class, 'create'])->name('manager.products.create');
    Route::post('/manager/products', [AdminProductController::class, 'store'])->name('manager.products.store');
    Route::get('/manager/products/{product}/edit', [AdminProductController::class, 'edit'])->name('manager.products.edit');
    Route::put('/manager/products/{product}', [AdminProductController::class, 'update'])->name('manager.products.update');
    Route::delete('/manager/products/{product}', [AdminProductController::class, 'destroy'])->name('manager.products.destroy');
    Route::post('/manager/products/sort', [AdminProductController::class, 'updateSort'])->name('manager.products.sort');

    // Page Banners
    Route::get('/manager/banners', [AdminPageBannerController::class, 'index'])->name('manager.banners.index');
    Route::get('/manager/banners/create', [AdminPageBannerController::class, 'create'])->name('manager.banners.create');
    Route::post('/manager/banners', [AdminPageBannerController::class, 'store'])->name('manager.banners.store');
    Route::get('/manager/banners/{banner}/edit', [AdminPageBannerController::class, 'edit'])->name('manager.banners.edit');
    Route::put('/manager/banners/{banner}', [AdminPageBannerController::class, 'update'])->name('manager.banners.update');
    Route::delete('/manager/banners/{banner}', [AdminPageBannerController::class, 'destroy'])->name('manager.banners.destroy');
    Route::patch('/manager/banners/{banner}/toggle', [AdminPageBannerController::class, 'toggleActive'])->name('manager.banners.toggle');
    Route::post('/manager/banners/sort', [AdminPageBannerController::class, 'sort'])->name('manager.banners.sort');
});
