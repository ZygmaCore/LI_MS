<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// -------------------------
// Halaman Utama
// -------------------------
Route::get('/', fn() => view('welcome'))->name('home');

// Login/logout pakai Breeze/Fortify
require __DIR__.'/auth.php';

// -------------------------
// Register
// -------------------------
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [UserController::class, 'publicStore'])->name('register.store');

// Notifikasi cek email (tanpa auth)
Route::get('/register/notice', function() {
    $email = session('email');
    return view('auth.register-notice', compact('email'));
})->name('register.notice');

// Link verifikasi khusus pendaftaran (tanpa user di DB)
Route::get('/register/verify/{token}', function(string $token) {
    $key = 'register:'.$token;
    if (!cache()->has($key)) {
        return redirect()->route('register')->withErrors(['token' => 'Token verifikasi tidak valid atau kedaluwarsa.']);
    }

    $payload = cache()->pull($key); // ambil dan hapus

    // Buat user sekarang dan tandai sudah terverifikasi
    $user = \App\Models\User::create([
        'nama' => $payload['nama'],
        'email' => $payload['email'],
        'password' => $payload['password'],
        'role' => $payload['role'] ?? 'siswa',
        'email_verified_at' => now(),
    ]);

    // Login dan arahkan ke dashboard
    auth()->login($user);
    return redirect()->route('dashboard');
})->name('register.verify');

// -------------------------
// Dashboard
// -------------------------
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified', 'nocache'])
    ->name('dashboard');

// -------------------------
// Email Verification
// -------------------------
Route::get('/email/verify', fn () => view('auth.verify-email'))
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('resent', true);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verification-check', function () {
    return response()->json([
        'verified' => auth()->check() && auth()->user()->hasVerifiedEmail(),
    ]);
})->middleware('auth')->name('verification.check');

// -------------------------
// Role-based Routes
// -------------------------
Route::middleware(['auth','nocache'])->group(function () {

    // Admin
    Route::resource('users', UserController::class)->middleware('role:admin');
    Route::resource('labs', LabController::class)->middleware('role:admin');

    // Admin & Guru
    Route::resource('barangs', BarangController::class)->middleware('role:admin,guru');
    Route::resource('peminjamans', PeminjamanController::class)->middleware('role:admin,guru');
    Route::resource('maintenances', MaintenanceController::class)->middleware('role:admin,guru');

    // Siswa
    Route::get('/siswa/barang', [PeminjamanController::class, 'listBarang'])->middleware('role:siswa');
    Route::post('/siswa/pinjam/{id}', [PeminjamanController::class, 'pinjam'])->middleware('role:siswa');
    Route::get('/siswa/riwayat', [PeminjamanController::class, 'riwayat'])->middleware('role:siswa');
});
