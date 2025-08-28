<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\MaintenanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Admin full access
    Route::resource('users', UserController::class)->middleware('role:admin');
    Route::resource('labs', LabController::class)->middleware('role:admin');

    // Admin & Guru
    Route::resource('barangs', BarangController::class)->middleware('role:admin,guru');
    Route::resource('peminjamans', PeminjamanController::class)->middleware('role:admin,guru');
    Route::resource('maintenances', MaintenanceController::class)->middleware('role:admin,guru');

    // Siswa khusus
    Route::get('/siswa/barang', [PeminjamanController::class, 'listBarang'])->middleware('role:siswa');
    Route::post('/siswa/pinjam/{id}', [PeminjamanController::class, 'pinjam'])->middleware('role:siswa');
    Route::get('/siswa/riwayat', [PeminjamanController::class, 'riwayat'])->middleware('role:siswa');
});

require __DIR__.'/auth.php';
