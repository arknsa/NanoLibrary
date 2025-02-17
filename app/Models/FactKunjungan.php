<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactKunjungan extends Model
{
    use HasFactory;

    protected $table = 'fact_kunjungan';
    protected $connection = 'mysql_dw';

    protected $fillable = [
        'sk_kunjungan',
        'entry_time',
        'exit_time',
        'durasi',
        'sk_waktu',
        'sk_user',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(DimUser::class, 'sk_user');
    }

    public function waktu()
    {
        return $this->belongsTo(DimWaktu::class, 'sk_waktu');
    }
}
