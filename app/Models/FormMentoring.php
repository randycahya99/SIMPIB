<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormMentoring extends Model
{
    protected $table = 'form_mentoring';
    protected $fillable = [
        'tanggal',
        'perihal',
        'strategi_marketing',
        'pengembangan_produk',
        'branding',
        'sistemasi_organisasi',
        'tenant_id',
        'mentor_id'
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
