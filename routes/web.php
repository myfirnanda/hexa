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
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/software-development', [ServiceController::class, 'softwareDevelopment'])->name('services.software-development');
Route::get('/services/startup-incubator', [ServiceController::class, 'startupIncubator'])->name('services.startup-incubator');
Route::get('/services/managed-service', [ServiceController::class, 'managedService'])->name('services.managedService');
Route::get('/works', [WorkController::class, 'index'])->name('works.index');
Route::get('/works/{project}', [WorkController::class, 'show'])->name('works.show');
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/start-project', [StartProjectController::class, 'index'])->name('start-project');
Route::post('/start-project/submit', [OrderController::class, 'store'])->name('start-project.submit');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Orders
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::patch('/admin/orders/{order}/status/{status}', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
    Route::delete('/admin/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');

    // Services (Produk/Layanan)
    Route::get('/admin/services', [AdminServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/services/create', [AdminServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [AdminServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [AdminServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [AdminServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [AdminServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Projects
    Route::get('/admin/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // Clients
    Route::get('/admin/clients', [AdminClientController::class, 'index'])->name('admin.clients.index');
    Route::get('/admin/clients/create', [AdminClientController::class, 'create'])->name('admin.clients.create');
    Route::post('/admin/clients', [AdminClientController::class, 'store'])->name('admin.clients.store');
    Route::put('/admin/clients/{client}', [AdminClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('/admin/clients/{client}', [AdminClientController::class, 'destroy'])->name('admin.clients.destroy');

    // CKEditor image upload
    Route::post('/admin/upload-image', [App\Http\Controllers\Admin\UploadController::class, 'image'])->name('admin.upload.image');

    // Testimonials
    Route::get('/admin/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/admin/testimonials/create', [AdminTestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/admin/testimonials', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/admin/testimonials/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    // Products (Produk)
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});
