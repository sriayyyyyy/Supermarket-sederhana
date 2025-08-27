<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // cek apakah kolom ada sebelum di-drop
            if (Schema::hasColumn('transaksis', 'produk_id')) {
                $table->dropForeign(['produk_id']); // hapus FK dulu
                $table->dropColumn('produk_id');    // baru hapus kolom
            }
        });
    }

    public function down(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();
        });
        
    }
};
