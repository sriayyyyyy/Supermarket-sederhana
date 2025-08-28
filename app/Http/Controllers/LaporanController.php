<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    // 📌 Laporan transaksi dengan filter tanggal (jika diisi)
    public function index(Request $request)
    {
        $query = Transaksi::with('produk');

        // Filter berdasarkan tanggal jika input tersedia
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        // Ambil semua data transaksi (terurut terbaru)
        $transaksis = $query->orderBy('created_at', 'desc')->get();

        // Hitung total harga semua transaksi
        $totalKeseluruhan = $transaksis->sum('total_harga');

        // Kirim data ke view
        return view('laporan.index', compact('transaksis', 'totalKeseluruhan'));
    }

    // 📤 Export laporan transaksi ke CSV
    public function export(Request $request)
    {
        $query = Transaksi::with('produk');

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('created_at', [
                $request->tanggal_mulai . ' 00:00:00',
                $request->tanggal_akhir . ' 23:59:59'
            ]);
        }
        

        $transaksis = $query->orderBy('created_at', 'desc')->get();

        // Export ke CSV
        $filename = 'laporan-transaksi.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($transaksis) {
            $file = fopen('php://output', 'w');
            // Header kolom
            fputcsv($file, ['Tanggal', 'Nama Produk', 'Jumlah', 'Total Harga']);
            // Data isi
            foreach ($transaksis as $transaksi) {
                fputcsv($file, [
                    $transaksi->created_at->format('Y-m-d'),
                    $transaksi->produk->nama ?? '-',
                    $transaksi->jumlah,
                    $transaksi->total_harga,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
