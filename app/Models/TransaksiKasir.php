<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiKasir extends Model
{
    protected $table = 'transaksi_kasir'; // nama tabel di database
    protected $guarded = []; // jika mau mass assignable semua field
    public $timestamps = false; // kalau tabel tidak ada kolom created_at & updated_at
}
