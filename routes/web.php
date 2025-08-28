<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Login Routes (tanpa middleware)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Semua route yang butuh autentikasi
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman Profil
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil.index');

    // Resource Routes
    Route::resources([
        'transaksi'   => TransaksiController::class,
        'produk'      => ProdukController::class,
        'pemasukan'   => PemasukanController::class,
        'pengeluaran' => PengeluaranController::class,
        'pengaturan'  => PengaturanController::class,
    ]);

    // Laporan hanya untuk index (list) dan export
    Route::resource('laporan', LaporanController::class)->only(['index']);
    Route::get('/laporan/export', [LaporanController::class, 'export'])->name('laporan.export');
});
