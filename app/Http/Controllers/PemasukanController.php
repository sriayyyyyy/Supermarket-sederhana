<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Menampilkan daftar semua pemasukan.
     */
    public function index()
    {
        $pemasukan = Pemasukan::latest()->get();
        return view('pemasukan.index', compact('pemasukan'));
    }

    /**
     * Menampilkan form tambah pemasukan.
     */
    public function create()
    {
        return view('pemasukan.create');
    }

    /**
     * Menyimpan data pemasukan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jumlah'     => 'required|numeric',
            'tanggal'    => 'required|date',
        ]);

        // Simpan hanya field yang diizinkan
        Pemasukan::create($request->only(['keterangan', 'jumlah', 'tanggal']));

        return redirect()->route('pemasukan.index')
                         ->with('success', 'Pemasukan berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit pemasukan.
     */
    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukan.edit', compact('pemasukan'));
    }

    /**
     * Mengupdate data pemasukan.
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jumlah'     => 'required|numeric',
            'tanggal'    => 'required|date',
        ]);

        $pemasukan->update($request->only(['keterangan', 'jumlah', 'tanggal']));

        return redirect()->route('pemasukan.index')
                         ->with('success', 'Pemasukan berhasil diperbarui');
    }

    /**
     * Menghapus pemasukan.
     */
    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')
                         ->with('success', 'Pemasukan berhasil dihapus');
    }
}
