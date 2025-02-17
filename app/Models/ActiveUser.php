<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Pastikan ini ada
use Illuminate\Database\Eloquent\Model;

class ActiveUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'entry_time', 'exit_time', 'entry_date']; // Menambahkan entry_date

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

