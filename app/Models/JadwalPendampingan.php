<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPendampingan extends Model
{
    protected $table = 'jadwal_pendampingan';
    protected $fillable = [
        'tanggal', 'topik', 'link', 'status', 'keterangan', 'tenant_id', 'pendamping_id'
    ];

    public function tenants()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function pendampings()
    {
        return $this->belongsTo(Pendamping::class, 'pendamping_id');
    }
}
