<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaturanController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Transaksi
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

// Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

// Pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
