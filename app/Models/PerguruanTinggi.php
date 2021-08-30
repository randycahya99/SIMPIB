<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerguruanTinggi extends Model
{
    protected $table = 'perguruan_tinggi';
    protected $fillable = [
        'kode', 'perguruan_tinggi'
    ];
}
