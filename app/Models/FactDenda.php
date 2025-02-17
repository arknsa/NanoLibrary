<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactDenda extends Model
{
    use HasFactory;

    protected $table = 'fact_denda';
    protected $connection = 'mysql_dw';
    protected $primaryKey = 'sk_denda';
    public $timestamps = false;

    protected $fillable = [
        'sk_user',
        'sk_buku',
        'sk_waktu',
        'Tanggal_Peminjaman',
        'Tanggal_Pengembalian',
        'Tenggat_Pengembalian',
        'denda'
    ];

    /**
     * Method untuk menghitung biaya denda berdasarkan Durasi_Terlambat.
     * Setiap 2 jam = 1000, berlaku kelipatan.
     * Contoh: 2 jam = 1000, 4 jam = 2000, ... 24 jam = 12000
     */
}
