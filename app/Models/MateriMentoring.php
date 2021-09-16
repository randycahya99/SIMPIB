<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriMentoring extends Model
{
    protected $table = 'materi_mentoring';
    protected $fillable = [
        'tanggal', 'materi', 'keterangan', 'from', 'tenant_id', 'mentor_id'
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
