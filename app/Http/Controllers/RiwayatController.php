<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('transaksi');

        // Filter tanggal jika ada input
        if ($request->filled(['dari', 'sampai'])) {
            $query->whereBetween('tanggal', [$request->dari, $request->sampai]);
        }

        $data = $query->get();

        return view('pengaturan.index', compact('data'));
    }
}
