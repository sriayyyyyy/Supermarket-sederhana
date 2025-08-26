<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('transaksis', function (Blueprint $table) {
        // Hapus foreign key dulu
        $table->dropForeign(['produk_id']); 
        
        // Baru drop kolom
        $table->dropColumn('produk_id'); 

        // Tambahkan kolom baru
        $table->unsignedBigInteger('produk_nama')->nullable();
    });
}

    public function down(): void
{
    Schema::table('transaksis', function (Blueprint $table) {
        $table->dropColumn('produk_nama');

        $table->unsignedBigInteger('produk_id')->nullable();

        // Kalau mau, tambahkan lagi foreign key ke tabel produk
        $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
    });
}


};
