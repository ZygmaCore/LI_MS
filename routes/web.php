<?php

use Illuminate\Support\Facades\Route;

// 🔑 AUTH (login, register, lupa password)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


// 🏠 DASHBOARD
Route::middleware(['auth'])->group(function () {

    // dashboard role-based
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');

    Route::get('/dashboard/guru', function () {
        return view('dashboard.guru');
    })->name('dashboard.guru');

    Route::get('/dashboard/siswa', function () {
        return view('dashboard.siswa');
    })->name('dashboard.siswa');


    // 👤 USERS
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', function () {
            return view('users.index');
        })->name('index');

        Route::get('/create', function () {
            return view('users.create');
        })->name('create');

        Route::get('/{id}/edit', function ($id) {
            return view('users.edit', compact('id'));
        })->name('edit');
    });


    // 🧪 LABS
    Route::prefix('labs')->name('labs.')->group(function () {
        Route::get('/', function () {
            return view('labs.index');
        })->name('index');

        Route::get('/create', function () {
            return view('labs.create');
        })->name('create');

        Route::get('/{id}/edit', function ($id) {
            return view('labs.edit', compact('id'));
        })->name('edit');
    });


    // 📦 BARANG
    Route::prefix('barang')->name('barang.')->group(function () {
        Route::get('/', function () {
            return view('barang.index');
        })->name('index');

        Route::get('/create', function () {
            return view('barang.create');
        })->name('create');

        Route::get('/{id}/edit', function ($id) {
            return view('barang.edit', compact('id'));
        })->name('edit');
    });


    // 📑 PEMINJAMAN
    Route::prefix('peminjaman')->name('peminjaman.')->group(function () {
        Route::get('/', function () {
            return view('peminjaman.index');
        })->name('index');

        Route::get('/create', function () {
            return view('peminjaman.create');
        })->name('create');

        Route::get('/{id}', function ($id) {
            return view('peminjaman.show', compact('id'));
        })->name('show');
    });


    // 🔧 MAINTENANCE
    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        Route::get('/', function () {
            return view('maintenance.index');
        })->name('index');

        Route::get('/create', function () {
            return view('maintenance.create');
        })->name('create');

        Route::get('/{id}/edit', function ($id) {
            return view('maintenance.edit', compact('id'));
        })->name('edit');
    });

});


// 🌐 HALAMAN WELCOME
Route::get('/', function () {
    return view('welcome');
});
