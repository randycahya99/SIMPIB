<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahapInkubasi extends Model
{
    protected $table = 'tahap_inkubasi';
    protected $fillable = [
        'kode', 'tahap_inkubasi'
    ];
}
