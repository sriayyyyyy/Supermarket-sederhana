<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // 📌 Tampilkan daftar produk
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }
}
