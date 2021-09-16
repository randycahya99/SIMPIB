<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $table = 'mentor';
    protected $fillable = [
        'nama_mentor', 'alamat', 'no_hp', 'email', 'category_id', 'bidang_id'
    ];

    public function categories()
    {
        return $this->belongsTo(CategoryMentor::class, 'category_id');
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

    public function jadwalMentorings()
    {
        return $this->hasMany(JadwalMentoring::class);
    }

    public function materiMentorings()
    {
        return $this->hasMany(MateriMentoring::class);
    }
}
