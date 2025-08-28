<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_transaksis_table.php
public function up()
{
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade'); // ✅ perbaikan
        $table->integer('jumlah');
        $table->decimal('total_harga', 10, 2);
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
