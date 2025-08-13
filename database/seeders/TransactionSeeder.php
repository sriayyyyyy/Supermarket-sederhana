<?php
namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today();

        // Hapus data lama (opsional di development)
        DB::table('transactions')->truncate();

        // Generate 20 hari ke belakang
        for ($i = 0; $i < 20; $i++) {
            $date = $today->copy()->subDays($i);

            // Random pemasukan
            Transaction::create([
                'date' => $date,
                'type' => 'income',
                'amount' => rand(200000, 2000000),
                'description' => 'Penjualan harian',
            ]);

            // Random pengeluaran
            Transaction::create([
                'date' => $date,
                'type' => 'expense',
                'amount' => rand(50000, 1200000),
                'description' => 'Belanja stok / operasional',
            ]);
        }
    }
}