<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coaching extends Model
{
    protected $table = 'coaching';
    protected $fillable = [
        'tanggal', 'perihal', 'topik', 'tenant_id', 'coach_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function tenants()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function coachs()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }
}
