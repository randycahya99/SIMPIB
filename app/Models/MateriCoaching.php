<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriCoaching extends Model
{
    protected $table = 'materi_coaching';
    protected $fillable = [
        'tanggal', 'materi', 'keterangan', 'from', 'tenant_id', 'coach_id'
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
