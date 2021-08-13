<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMentor extends Model
{
    protected $table = 'category_mentor';
    protected $fillable = [
        'kode_mentor', 'kategori_mentor'
    ];

    public function mentors()
    {
        return $this->hasMany(Mentor::class);
    }
}
