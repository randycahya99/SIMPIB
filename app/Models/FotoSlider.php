<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoSlider extends Model
{
    protected $table = 'foto_slider';
    protected $fillable = [
        'keterangan', 'foto'
    ];
}
