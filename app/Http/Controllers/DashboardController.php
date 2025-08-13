<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $monthStart = Carbon::now()->startOfMonth();

        // Ringkasan saldo (total pemasukan - pengeluaran)
        $saldo = Transaction::selectRaw("SUM(CASE WHEN type='income' THEN amount ELSE -amount END) AS balance")
            ->value('balance') ?? 0;

        // Hari ini
        $pemasukanHariIni = Transaction::whereDate('date', $today)->where('type','income')->sum('amount');
        $pengeluaranHariIni = Transaction::whereDate('date', $today)->where('type','expense')->sum('amount');

        // Bulan ini
        $pemasukanBulanIni = Transaction::whereBetween('date', [$monthStart, $today])->where('type','income')->sum('amount');
        $pengeluaranBulanIni = Transaction::whereBetween('date', [$monthStart, $today])->where('type','expense')->sum('amount');

        // Data grafik 14 hari terakhir
        $start = Carbon::today()->subDays(13);
        $end = Carbon::today();

        $rows = Transaction::selectRaw("date, type, SUM(amount) as total")
            ->whereBetween('date', [$start, $end])
            ->groupBy('date','type')
            ->orderBy('date')
            ->get();

        // Siapkan label tanggal & dataset
        $labels = [];
        for ($d = $start->copy(); $d->lte($end); $d->addDay()) {
            $labels[] = $d->format('Y-m-d');
        }

        $incomeMap = collect($rows)->where('type','income')->keyBy(function($r){return Carbon::parse($r->date)->format('Y-m-d');});
        $expenseMap = collect($rows)->where('type','expense')->keyBy(function($r){return Carbon::parse($r->date)->format('Y-m-d');});

        $incomeSeries = array_map(fn($dt) => (float)($incomeMap[$dt]->total ?? 0), $labels);
        $expenseSeries = array_map(fn($dt) => (float)($expenseMap[$dt]->total ?? 0), $labels);

        return view('dashboard', [
            'saldo' => (float)$saldo,
            'pemasukanHariIni' => (float)$pemasukanHariIni,
            'pengeluaranHariIni' => (float)$pengeluaranHariIni,
            'pemasukanBulanIni' => (float)$pemasukanBulanIni,
            'pengeluaranBulanIni' => (float)$pengeluaranBulanIni,
            'labels' => $labels,
            'incomeSeries' => $incomeSeries,
            'expenseSeries' => $expenseSeries,
        ]);
    }
}