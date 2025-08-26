<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource Routes (CRUD otomatis)
Route::resources([
    'transaksi'   => TransaksiController::class,
    'produk'      => ProdukController::class,
    'laporan'     => LaporanController::class,
    'pemasukan'   => PemasukanController::class,
    'pengeluaran' => PengeluaranController::class,
    'pengaturan'  => PengaturanController::class,
]);

// Logout manual
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/dashboard'); // redirect ke dashboard setelah logout
})->name('logout');
