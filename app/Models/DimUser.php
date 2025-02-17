<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimUser extends Model
{
    use HasFactory;

    protected $table = 'dim_user';
    protected $connection = 'mysql_dw';

    protected $fillable = [
        'sk_user',
        'NIM',
        'Nama',
        'Email',
        'Angkatan',
        'Program_Studi',
    ];

    public $timestamps = false;
}
