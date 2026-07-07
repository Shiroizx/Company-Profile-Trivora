<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandingItemController;
use App\Http\Controllers\Admin\LandingSectionController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::post('/messages', [HomeController::class, 'storeMessage'])->name('messages.store');

Route::get('/setup-storage', function () {
    $target = storage_path('app/public');
    $link = base_path('../public_html/storage');

    try {
        if (file_exists($link)) {
            return 'Storage link sudah ada di public_html/storage. Hapus file ini jika ingin membuat ulang.';
        }
        symlink($target, $link);
        return 'Storage link BERHASIL dibuat di public_html/storage!';
    } catch (\Exception $e) {
        return 'Gagal membuat storage link: ' . $e->getMessage();
    }
});

Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');

    Route::get('sections', [LandingSectionController::class, 'index'])->name('sections.index');
    Route::get('sections/{section}/edit', [LandingSectionController::class, 'edit'])->name('sections.edit');
    Route::put('sections/{section}', [LandingSectionController::class, 'update'])->name('sections.update');

    Route::post('sections/{section}/items', [LandingItemController::class, 'store'])->name('items.store');
    Route::put('sections/{section}/items/{item}', [LandingItemController::class, 'update'])->name('items.update');
    Route::post('sections/{section}/items/{item}', [LandingItemController::class, 'update']); // Fallback POST
    Route::delete('sections/{section}/items/{item}', [LandingItemController::class, 'destroy'])->name('items.destroy');

    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/reset-limit', [MessageController::class, 'resetLimit'])->name('messages.reset-limit');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});
