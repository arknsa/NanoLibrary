<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimBuku extends Model
{
    use HasFactory;

    protected $table = 'dim_buku';
    protected $connection = 'mysql_dw';
    protected $fillable = [
        'sk_buku',
        'Judul',
        'Author',
        'Penerbit',
        'Bahasa',
        'Kategori',
        'Stok',
        'Akses',
    ];

    public $timestamps = false;
}
