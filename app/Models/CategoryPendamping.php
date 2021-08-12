<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPendamping extends Model
{
    protected $table = 'category_pendamping';
    protected $fillable = [
        'kode_pendamping', 'kategori_pendamping'
    ];
}
