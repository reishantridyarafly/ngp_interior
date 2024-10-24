<?php

use Illuminate\Support\Facades\Route;

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
    Route::post('/proyek', [App\Http\Controllers\Backend\ProjectController::class, 'store'])->name('project.store');
    Route::post('/proyek/updateStatus', [App\Http\Controllers\Backend\ProjectController::class, 'updateStatus'])->name('project.updateStatus');
    Route::get('/proyek/{id}/edit', [App\Http\Controllers\Backend\ProjectController::class, 'edit'])->name('project.edit');
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
});

require __DIR__ . '/auth.php';
