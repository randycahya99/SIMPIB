<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriPendampingan extends Model
{
    protected $table = 'materi_pendampingan';
    protected $fillable = [
        'tanggal', 'materi', 'keterangan', 'from', 'tenant_id', 'pendamping_id'
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
