<?php

// app/Models/Portfolio.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'ID_User';
    public $timestamps = true;
    protected $fillable = [
        'Email', 'NIM', 'Nama', 'No_Telp', 'Program_Studi', 'Angkatan', 'role',
    ];

    protected static function booted()
    {
        static::addGlobalScope('mahasiswa', function (Builder $builder) {
            $builder->where('role', 'mahasiswa');
        });
    }
}
