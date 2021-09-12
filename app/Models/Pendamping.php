<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    protected $table = 'pendamping';
    protected $fillable = [
        'nama_pendamping', 'alamat', 'no_hp', 'email', 'category_id', 'bidang_id'
    ];

    public function categories()
    {
        return $this->belongsTo(CategoryPendamping::class, 'category_id');
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

    public function jadwalPendampingans()
    {
        return $this->hasMany(JadwalPendampingan::class);
    }

    public function formPendampingans()
    {
        return $this->hasMany(FormPendampingan::class);
    }

    public function materiPendampingans()
    {
        return $this->hasMany(MateriPendampingan::class);
    }
}
