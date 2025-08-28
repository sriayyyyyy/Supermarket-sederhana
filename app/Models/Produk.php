<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Sesuaikan nama tabel jika berbeda
    protected $table = 'produks';

    protected $fillable = [
        'nama',
        'stok',
        'harga',
    ];
}
