<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;

class TransaksiController extends Controller
{
    // Tampilkan form transaksi
    public function create()
    {
        $produks = Produk::all(); // Ambil semua produk
        return view('transaksi.create', compact('produks'));
    }

    // Simpan transaksi ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Ambil produk untuk ambil harga
        $produk = Produk::findOrFail($request->produk_id);

        // Hitung total harga
        $totalHarga = $produk->harga * $request->jumlah;

        // Simpan transaksi
        Transaksi::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $totalHarga,
        ]);

        // Redirect ke daftar transaksi
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    // Tampilkan daftar transaksi + total keseluruhan
    public function index()
    {
        $transaksis = Transaksi::with('produk')->latest()->get();

        // Hitung total keseluruhan
        $totalKeseluruhan = $transaksis->sum('total_harga');

        return view('transaksi.index', compact('transaksis', 'totalKeseluruhan'));
    }
}
