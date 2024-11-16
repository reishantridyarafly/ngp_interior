<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/file/private/{filename}', function ($filename) {
    $path = 'uploads/survey/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.private');

Route::get('/', [App\Http\Controllers\Frontend\BerandaController::class, 'index'])->name('beranda.index');
Route::get('/tentang', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about.index');

Route::get('/proyek-ngp', [App\Http\Controllers\Frontend\ProjectController::class, 'index'])->name('project-ngp.index');
Route::get('/proyek-ngp/detail', [App\Http\Controllers\Frontend\ProjectController::class, 'detail'])->name('project-ngp.detail');

Route::get('/properti', [App\Http\Controllers\Frontend\PropertyController::class, 'index'])->name('property.index');
Route::get('/keranjang', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart.index');
Route::get('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact.index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/proyek', [App\Http\Controllers\Backend\ProjectController::class, 'index'])->name('project.index');
    Route::get('/proyek/tambah', [App\Http\Controllers\Backend\ProjectController::class, 'create'])->name('project.create');
    Route::post('/proyek', [App\Http\Controllers\Backend\ProjectController::class, 'store'])->name('project.store');
    Route::post('/proyek/updateStatus', [App\Http\Controllers\Backend\ProjectController::class, 'updateStatus'])->name('project.updateStatus');
    Route::get('/proyek/{id}/edit', [App\Http\Controllers\Backend\ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/proyek/{id}', [App\Http\Controllers\Backend\ProjectController::class, 'update'])->name('project.update');
    Route::delete('/proyek/{id}', [App\Http\Controllers\Backend\ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/ubah/password', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/profile/pengaturan/', [App\Http\Controllers\Backend\ProfileController::class, 'settingsProfile'])->name('profile.settings');
    Route::post('/profile/pengaturan/hapus-foto', [App\Http\Controllers\Backend\ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::post('/profile/hapus/akun', [App\Http\Controllers\Backend\ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');

    Route::get('/kategori', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('category.index');
    Route::get('/kategori/tambah', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('category.create');
    Route::get('/kategori/{id}/edit', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/kategori', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('category.store');
    Route::delete('/kategori/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/pelanggan', [App\Http\Controllers\Backend\CustomersController::class, 'index'])->name('customers.index');
    Route::post('/pelanggan', [App\Http\Controllers\Backend\CustomersController::class, 'store'])->name('customers.store');
    Route::post('/pelanggan/updateStatus', [App\Http\Controllers\Backend\CustomersController::class, 'updateStatus'])->name('customers.updateStatus');
    Route::get('/pelanggan/{id}/edit', [App\Http\Controllers\Backend\CustomersController::class, 'edit'])->name('customers.edit');
    Route::delete('/pelanggan/{id}', [App\Http\Controllers\Backend\CustomersController::class, 'destroy'])->name('customers.destroy');

    Route::get('/pemesanan', [App\Http\Controllers\Backend\OrderController::class, 'index'])->name('order.index');
    Route::post('/pemesanan/tambah/pesanan', [App\Http\Controllers\Backend\OrderController::class, 'store_order'])->name('order.store_order');
    Route::post('/pemesanan/tambah/survei', [App\Http\Controllers\Backend\OrderController::class, 'store_survey'])->name('order.store_survey');
    Route::get('/pemesanan/{invoice}/detail', [App\Http\Controllers\Backend\OrderController::class, 'detail'])->name('order.detail');
    Route::get('/pemesanan/{id}/edit', [App\Http\Controllers\Backend\OrderController::class, 'edit'])->name('order.edit');
    Route::delete('/pemesanan/{id}', [App\Http\Controllers\Backend\OrderController::class, 'destroy'])->name('order.destroy');

    Route::post('/pemesanan/bagian', [App\Http\Controllers\Backend\OrderController::class, 'store_section'])->name('order.store_section');
    Route::get('/pemesanan/bagian/{id}/edit', [App\Http\Controllers\Backend\OrderController::class, 'edit_section'])->name('order.edit_section');
    Route::delete('/pemesanan/bagian/{id}', [App\Http\Controllers\Backend\OrderController::class, 'destroy_section'])->name('order.destroy_section');

    Route::get('/pemesanan/item/{idSection}/', [App\Http\Controllers\Backend\OrderItemController::class, 'index'])->name('orderItem.index');
    Route::post('/pemesanan/item/', [App\Http\Controllers\Backend\OrderItemController::class, 'store'])->name('orderItem.store');
});

require __DIR__ . '/auth.php';
