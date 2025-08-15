<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Field yang bisa diisi secara mass-assignment
    protected $fillable = ['produk_id', 'jumlah', 'total_harga'];

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
