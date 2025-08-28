<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi; // Pastikan model ini sudah ada

class PengaturanController extends Controller
{
    // Menampilkan halaman pengaturan dengan data transaksi dan filter tanggal
    public function index(Request $request)
    {
        $query = Transaksi::query();

        if ($request->dari && $request->sampai) {
            $query->whereBetween('tanggal', [$request->dari, $request->sampai]);
        }

        $data = $query->get();

        return view('pengaturan.index', compact('data'));
    }

    // Contoh method export untuk export Excel (optional, bisa dikembangkan)
    public function export(Request $request)
    {
        $query = Transaksi::query();

        if ($request->dari && $request->sampai) {
            $query->whereBetween('tanggal', [$request->dari, $request->sampai]);
        }

        $data = $query->get();

        // Logika export Excel di sini
        // Contoh sederhana export CSV:
        $filename = 'export_transaksi_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename={$filename}",
        ];

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Tanggal', 'Kasir', 'Kode Transaksi', 'Total']); // Header CSV

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->tanggal,
                    $row->kasir,
                    $row->kode_transaksi,
                    $row->total,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
