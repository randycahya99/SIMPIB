<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalMentoring extends Model
{
    protected $table = 'jadwal_mentoring';
    protected $fillable = [
        'tanggal', 'topik', 'link', 'status', 'keterangan', 'tenant_id', 'mentor_id'
    ];

    public function tenants()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function mentors()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
