<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTenant extends Model
{
    protected $table = 'product_tenant';
    protected $fillable = [
        'nama_produk', 'deskripsi', 'foto'
    ];
}
