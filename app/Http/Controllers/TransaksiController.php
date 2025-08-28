<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('produk')->latest()->paginate(10);
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $produk = Produk::select('id', 'nama_produk', 'harga', 'stok')
                        ->orderBy('nama_produk')
                        ->get();

        $transaksi = Transaksi::with('produk')->latest()->take(10)->get();

        return view('transaksi.create', compact('produk', 'transaksi'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'jumlah'    => 'required|integer|min:1',
            'tanggal'   => 'required|date',
        ]);

        // ambil produk
        $produk = Produk::findOrFail($data['produk_id']);

        // hitung total harga
        $data['total'] = $produk->harga * $data['jumlah'];

        // simpan transaksi
        Transaksi::create($data);

        // kurangi stok produk
        $produk->decrement('stok', $data['jumlah']);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}
