<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCoach extends Model
{
    protected $table = 'category_coach';
    protected $fillable = [
        'kode_coach', 'kategori_coach'
    ];

    public function coachs()
    {
        return $this->hasMany(Coach::class);
    }
}
