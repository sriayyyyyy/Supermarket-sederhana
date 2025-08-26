<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    // 📌 Laporan transaksi
    public function index()
    {
        $transaksis = Transaksi::with('produk')->latest()->get();
        $totalKeseluruhan = $transaksis->sum('total_harga');

        return view('laporan.index', compact('transaksis', 'totalKeseluruhan'));
    }
}