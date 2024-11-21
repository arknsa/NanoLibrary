<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveUser extends Model
{
    protected $fillable = ['user_id', 'entry_time', 'exit_time'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
