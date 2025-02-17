<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    use HasFactory;

    protected $table = 'dim_waktu';
    protected $connection = 'mysql_dw';

    protected $fillable = [
        'sk_waktu',
        'tanggal',
        'hari',
        'bulan',
        'kuartal',
        'tahun',
    ];

    public $timestamps = false;
}
