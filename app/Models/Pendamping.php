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
}
