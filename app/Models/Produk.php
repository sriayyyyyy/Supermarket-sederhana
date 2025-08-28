<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; // pastikan sesuai dengan migration
    protected $fillable = ['nama_produk', 'harga', 'stok'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'produk_id');
    }
}
