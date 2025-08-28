<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    // 📌 Tampilkan daftar transaksi + filter tanggal + total keseluruhan
    public function index(Request $request)
    {
        $query = Transaksi::with('produk')->latest();

        // Filter berdasarkan tanggal jika ada input dari user
        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tanggal', [$request->dari, $request->sampai]);
        }

        $transaksis = $query->get();
        $totalKeseluruhan = $transaksis->sum('total_harga');

        return view('transaksi.index', compact('transaksis', 'totalKeseluruhan'));
    }

    // 📌 Form tambah transaksi
    public function create()
    {
        $produks = Produk::all();
        return view('transaksi.create', compact('produks'));
    }

    // 📌 Simpan transaksi + update stok
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah'    => 'required|integer|min:1',
            'tanggal'   => 'required|date',
        ]);

        // Ambil produk
        $produk = Produk::findOrFail($request->produk_id);

        // Cek stok cukup
        if ($request->jumlah > $produk->stok) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi!');
        }

        // Hitung total harga
        $totalHarga = $produk->harga * $request->jumlah;

        // Simpan transaksi
        Transaksi::create([
            'produk_id'   => $produk->id,
            'jumlah'      => $request->jumlah,
            'tanggal'     => $request->tanggal,
            'total_harga' => $totalHarga,
        ]);

        // Update stok produk
        $produk->stok -= $request->jumlah;
        $produk->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    // 📌 Detail transaksi
    public function show($id)
    {
        $transaksi = Transaksi::with('produk')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }
}
