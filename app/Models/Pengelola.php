<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'pengelola';
    protected $fillable = [
        'nama_pengelola', 'jabatan', 'no_hp', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
