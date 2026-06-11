<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\SkemaController;
use Illuminate\Support\Facades\Route;

// ==================== ROUTE PUBLIC / FRONTEND ====================
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profil'])->name('profil');
Route::get('/skema', [PublicController::class, 'skema'])->name('skema');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PublicController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/event', [PublicController::class, 'event'])->name('event');
Route::get('/event/{slug}', [PublicController::class, 'eventDetail'])->name('event.detail');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');


// ==================== ROUTE ADMIN / BACKEND (Proteksi Auth) ====================
// Hanya bisa diakses jika admin sudah login lewat Laravel Breeze
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Halaman Utama Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Otomatis Membuat 7 Route CRUD standar Laravel Resource
    Route::resource('berita', BeritaController::class);
    Route::resource('event', EventController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('skema', SkemaController::class);
});

// Menghubungkan sistem login/logout bawaan Laravel Breeze
if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}