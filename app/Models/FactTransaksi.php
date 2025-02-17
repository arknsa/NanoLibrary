<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactTransaksi extends Model
{
    use HasFactory;

    protected $table = 'fact_transaksi';
    protected $connection = 'mysql_dw';

    protected $fillable = [
        'sk_transaksi',
        'Tanggal_Peminjaman',
        'Tenggat_Pengembalian',
        'Tanggal_Pengembalian',
        'durasi',
        'lama_keterlambatan',
        'status',
        'sk_buku',
        'sk_user',
        'sk_waktu',
    ];

    public $timestamps = false;

    public function buku()
    {
        return $this->belongsTo(DimBuku::class, 'sk_buku');
    }

    public function user()
    {
        return $this->belongsTo(DimUser::class, 'sk_user');
    }

    public function waktu()
    {
        return $this->belongsTo(DimWaktu::class, 'sk_waktu');
    }
}
