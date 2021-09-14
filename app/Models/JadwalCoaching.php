<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalCoaching extends Model
{
    protected $table = 'jadwal_coaching';
    protected $fillable = [
        'tanggal', 'topik', 'link', 'status', 'keterangan', 'tenant_id', 'coach_id'
    ];

    public function tenants()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function coachs()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }
}
