<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTenant extends Model
{
    protected $table = 'category_tenant';
    protected $fillable = [
        'kode_tenant', 'kategori_tenant'
    ];
}
