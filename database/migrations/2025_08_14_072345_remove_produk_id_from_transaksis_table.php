<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            if (Schema::hasColumn('transaksis', 'produk_id')) {
                $table->dropForeign(['produk_id']);
                $table->dropColumn('produk_id');
            }
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
