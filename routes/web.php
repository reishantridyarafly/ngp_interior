<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [App\Http\Controllers\Frontend\BerandaController::class, 'index'])->name('beranda.index');
Route::get('/tentang', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about.index');

Route::get('/proyek-ngp', [App\Http\Controllers\Frontend\ProjectController::class, 'index'])->name('project-ngp.index');
Route::get('/proyek-ngp/detail/{slug}', [App\Http\Controllers\Frontend\ProjectController::class, 'detail'])->name('project-ngp.detail');

Route::get('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact.index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/konsultasi', [App\Http\Controllers\Backend\ConsultingController::class, 'index'])->name('consulting.index');

    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/ubah/password', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/profile/pengaturan/', [App\Http\Controllers\Backend\ProfileController::class, 'settingsProfile'])->name('profile.settings');
    Route::post('/profile/pengaturan/hapus-foto', [App\Http\Controllers\Backend\ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::post('/profile/hapus/akun', [App\Http\Controllers\Backend\ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');

    Route::get('/pemesanan', [App\Http\Controllers\Backend\OrderController::class, 'index'])->name('order.index');
    Route::get('/pemesanan/{invoice}/detail', [App\Http\Controllers\Backend\OrderController::class, 'detail'])->name('order.detail');

    Route::get('/pemesanan', [App\Http\Controllers\Backend\OrderController::class, 'index'])->name('order.index');
    Route::post('/pemesanan/tambah/pesanan', [App\Http\Controllers\Backend\OrderController::class, 'store_order'])->name('order.store_order');
    Route::get('/pemesanan/{invoice}/detail', [App\Http\Controllers\Backend\OrderController::class, 'detail'])->name('order.detail');
    Route::get('/pemesanan/{id}/edit', [App\Http\Controllers\Backend\OrderController::class, 'edit'])->name('order.edit');
    Route::delete('/pemesanan/{id}', [App\Http\Controllers\Backend\OrderController::class, 'destroy'])->name('order.destroy');

    Route::post('/pemesanan/tambah/survei', [App\Http\Controllers\Backend\OrderController::class, 'store_survey'])->name('order.store_survey');
    Route::post('/pemesanan/tambah/survei/foto', [App\Http\Controllers\Backend\OrderController::class, 'store_image_survey'])->name('order.store_image_survey');
    Route::delete('/pemesanan/hapus/survey/foto/{id}', [App\Http\Controllers\Backend\OrderController::class, 'destroy_image_survey'])->name('order.destroy_image_survey');

    Route::post('/pemesanan/bagian', [App\Http\Controllers\Backend\OrderController::class, 'store_section'])->name('order.store_section');
    Route::get('/pemesanan/bagian/{id}/edit', [App\Http\Controllers\Backend\OrderController::class, 'edit_section'])->name('order.edit_section');
    Route::delete('/pemesanan/bagian/{id}', [App\Http\Controllers\Backend\OrderController::class, 'destroy_section'])->name('order.destroy_section');

    Route::get('/pemesanan/item/{idSection}/', [App\Http\Controllers\Backend\OrderItemController::class, 'index'])->name('orderItem.index');
    Route::post('/pemesanan/item/', [App\Http\Controllers\Backend\OrderItemController::class, 'store'])->name('orderItem.store');

    Route::get('/pemesanan/rab/print', [App\Http\Controllers\Print\RABController::class, 'index'])->name('printRAB.index');

    Route::get('/pemesanan/desain/tambah/{invoice}', [App\Http\Controllers\Backend\OrderDesignController::class, 'create'])->name('orderDesign.create');
    Route::post('/pemesanan/desain/tambah', [App\Http\Controllers\Backend\OrderDesignController::class, 'store'])->name('orderDesign.store');
    Route::post('/pemesanan/desain/tambah/revisi', [App\Http\Controllers\Backend\OrderDesignController::class, 'store_revision'])->name('orderDesign.store_revision');
    Route::delete('/pemesanan/design/{id}', [App\Http\Controllers\Backend\OrderDesignController::class, 'destroy'])->name('orderDesign.destroy');

    Route::post('/pemesanan/persetujuan/pesanan', [App\Http\Controllers\Backend\OrderApprovalDesignController::class, 'store'])->name('orderApprove.store');

    Route::post('/pemesanan/installation', [App\Http\Controllers\Backend\OrderInstallationController::class, 'store'])->name('orderInstallation.store');

    Route::post('/rating', [App\Http\Controllers\Backend\RatingController::class, 'store'])->name('rating.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/proyek', [App\Http\Controllers\Backend\ProjectController::class, 'index'])->name('project.index');
    Route::get('/proyek/tambah', [App\Http\Controllers\Backend\ProjectController::class, 'create'])->name('project.create');
    Route::post('/proyek', [App\Http\Controllers\Backend\ProjectController::class, 'store'])->name('project.store');
    Route::post('/proyek/updateStatus', [App\Http\Controllers\Backend\ProjectController::class, 'updateStatus'])->name('project.updateStatus');
    Route::get('/proyek/{id}/edit', [App\Http\Controllers\Backend\ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/proyek/{id}', [App\Http\Controllers\Backend\ProjectController::class, 'update'])->name('project.update');
    Route::delete('/proyek/{id}', [App\Http\Controllers\Backend\ProjectController::class, 'destroy'])->name('project.destroy');

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

    Route::post('/pemesanan/tambah/pesanan', [App\Http\Controllers\Backend\OrderController::class, 'store_order'])->name('order.store_order');
    Route::get('/pemesanan/{id}/edit', [App\Http\Controllers\Backend\OrderController::class, 'edit'])->name('order.edit');
    Route::delete('/pemesanan/{id}', [App\Http\Controllers\Backend\OrderController::class, 'destroy'])->name('order.destroy');

    Route::post('/pemesanan/persetujuan/gambar', [App\Http\Controllers\Backend\OrderApprovalDesignController::class, 'store_photos'])->name('orderApprove.store_photos');
    Route::delete('/pemesanan/persetujuan/{id}', [App\Http\Controllers\Backend\OrderApprovalDesignController::class, 'destroy'])->name('orderApprove.destroy');

    Route::post('/pemesanan/produksi/gambar', [App\Http\Controllers\Backend\OrderProductionController::class, 'store_photos'])->name('orderProduction.store_photos');
    Route::delete('/pemesanan/produksi/{id}', [App\Http\Controllers\Backend\OrderProductionController::class, 'destroy'])->name('orderProduction.destroy');
});

Route::get('/file/survey/{filename}', function ($filename) {
    $path = 'uploads/survey/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.survey');

Route::get('/file/pembayaran/pertama/{filename}', function ($filename) {
    $path = 'uploads/initial_payment/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.initial_payment');

Route::get('/file/pembayaran/kedua/{filename}', function ($filename) {
    $path = 'uploads/ten_percent_payment/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.ten_percent_payment');

Route::get('/file/pembayaran/ketiga/{filename}', function ($filename) {
    $path = 'uploads/fifty_percent_payment/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.fifty_percent_payment');

Route::get('/file/design/{filename}', function ($filename) {
    $path = 'uploads/design/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.design');

Route::get('/file/working/{filename}', function ($filename) {
    $path = 'uploads/working/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.working');

Route::get('/file/production/{filename}', function ($filename) {
    $path = 'uploads/production/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.production');

Route::get('/file/last_payment/{filename}', function ($filename) {
    $path = 'uploads/last_payment/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.last_payment');

Route::get('/file/project/{filename}', function ($filename) {
    $path = 'uploads/project/' . $filename;

    if (Storage::disk('private')->exists($path)) {
        return response()->file(storage_path('app/private/' . $path));
    }

    abort(404);
})->name('file.project');

require __DIR__ . '/auth.php';
