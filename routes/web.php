<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\LengkapiProfilController;
use App\Http\Controllers\HealthAppController;
use App\Http\Controllers\TantanganController;
use App\Http\Controllers\UMKMController;
use App\Models\Notification;

Route::get('/', [BerandaController::class, 'home'])->name('beranda');

Auth::routes();

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/lengkapi-profil', [LengkapiProfilController::class, 'index'])->name('lengkapi-profil');
    Route::post('/profil-update', [LengkapiProfilController::class, 'update'])->name('profil.update');
});

Route::get('/auth/google/redirect', [HealthAppController::class, 'connectGoogleFit'])->name('google.fit.connect');
Route::get('/auth/google/callback', [HealthAppController::class, 'handleGoogleFitCallback'])->name('google.fit.callback');

Route::get('/notifications/read/{id}', function($id) {
    $notif = Notification::findOrFail($id);
    $notif->update(['is_read' => true]);
    return redirect($notif->url);
})->name('notifications.read');

Route::get('/jelajahi', function() {
    return view('jelajahi');
});

Route::get('/aktivitas', [HealthAppController::class, 'aktivitas'])->name('aktivitas')->middleware('auth');

Route::get('/tantangan', [TantanganController::class, 'index'])->name('tantangan.index');
Route::get('/tantangan/{slug}', [TantanganController::class, 'show'])->name('tantangan.show');
Route::post('/tantangan/daftar/{id}', [TantanganController::class, 'register'])->name('tantangan.register');
Route::post('/tantangan/klaim/{id}', [TantanganController::class, 'klaimKoinSisa'])->name('tantangan.klaim');

Route::middleware(['auth'])->group(function () {
    Route::get('/partner-umkm', [UMKMController::class, 'index'])->name('umkm.index');
    Route::get('/partner-umkm/{slug}', [UMKMController::class, 'show'])->name('umkm.show');
    Route::post('/partner-umkm/{slug}/tukar', [UMKMController::class, 'tukar'])->name('umkm.tukar');
});