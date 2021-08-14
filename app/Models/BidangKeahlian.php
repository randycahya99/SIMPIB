<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    protected $table = 'bidang_keahlian';
    protected $fillable = [
        'kode_bidang', 'bidang_keahlian'
    ];

    public function coachs()
    {
        return $this->hasMany(Coach::class);
    }

    public function mentors()
    {
        return $this->hasMany(Mentor::class);
    }

    public function pendampings()
    {
        return $this->hasMany(Pendamping::class);
    }
}
