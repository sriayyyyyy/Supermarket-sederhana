<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // ✅ Tambahkan baris ini!
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
    {
        $produks = Produk::all();
        return view('transaksi.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $total = $produk->harga * $request->jumlah;

        if ($request->jumlah > $produk->stok) {
            return back()->withErrors('Stok tidak mencukupi.');
        }

        Transaksi::create([
            'produk_id' => $produk->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
        ]);

        $produk->stok -= $request->jumlah;
        $produk->save();

        return redirect()->back()->with('success', 'Transaksi berhasil!');
    }
}
