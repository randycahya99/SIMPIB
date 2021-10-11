<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'replies', 'from', 'coaching_id'
    ];

    public function coachings()
    {
        return $this->belongsTo(Coaching::class, 'coaching_id');
    }
}
