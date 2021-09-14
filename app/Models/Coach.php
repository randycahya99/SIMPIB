<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = 'coach';
    protected $fillable = [
        'nama_coach', 'alamat', 'no_hp', 'email', 'category_id', 'bidang_id'
    ];

    public function categories()
    {
        return $this->belongsTo(CategoryCoach::class, 'category_id');
    }

    public function bidangs()
    {
        return $this->belongsTo(BidangKeahlian::class, 'bidang_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function jadwalCoachings()
    {
        return $this->hasMany(JadwalCoaching::class);
    }

    public function materiCoachings()
    {
        return $this->hasMany(MateriCoaching::class);
    }
}
