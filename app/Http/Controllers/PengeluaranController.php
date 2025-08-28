<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    // Tampilkan daftar pengeluaran
    public function index()
    {
        $pengeluarans = Pengeluaran::latest()->get();
        return view('pengeluaran.index', compact('pengeluarans'));
    }

    // Form tambah pengeluaran
    public function create()
    {
        return view('pengeluaran.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Pengeluaran::create($request->all());

        return redirect()->route('pengeluaran.index')
                         ->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    // Form edit pengeluaran
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    // Update data pengeluaran
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $pengeluaran->update($request->all());

        return redirect()->route('pengeluaran.index')
                         ->with('success', 'Pengeluaran berhasil diupdate');
    }

    // Hapus pengeluaran
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')
                         ->with('success', 'Pengeluaran berhasil dihapus');
    }
}
