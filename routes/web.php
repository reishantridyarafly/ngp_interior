<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\BerandaController::class, 'index'])->name('beranda.index');
Route::get('/tentang', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about.index');
Route::get('/proyek', [App\Http\Controllers\Frontend\ProjectController::class, 'index'])->name('project.index');
Route::get('/properti', [App\Http\Controllers\Frontend\PropertyController::class, 'index'])->name('property.index');
Route::get('/keranjang', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart.index');
Route::get('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact.index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/ubah/password', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/profile/pengaturan/', [App\Http\Controllers\Backend\ProfileController::class, 'settingsProfile'])->name('profile.settings');
    Route::post('/profile/pengaturan/hapus-foto', [App\Http\Controllers\Backend\ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::post('/profile/hapus/akun', [App\Http\Controllers\Backend\ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');
});

require __DIR__ . '/auth.php';
