<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Hapus kolom produk_id
            $table->dropForeign(['produk_id']); // hapus FK dulu
            $table->dropColumn('produk_id');
        });
    }

    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Tambahkan kembali produk_id jika ingin rollback
            $table->unsignedBigInteger('produk_id')->nullable();
        });
    }
};
