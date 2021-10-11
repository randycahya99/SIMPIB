<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenant';
    protected $fillable = [
        'user_id',
        'nama',
        'no_identitas',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_kawin',
        'pendidikan_akhir',
        'perguruan_tinggi',
        'jurusan',
        'alamat',
        'kode_pos',
        'no_hp',
        'email',
        'website',
        'aktivasi',
        'coach_id',
        'mentor_id',
        'pendamping_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function usahas()
    {
        return $this->hasOne(Usaha::class);
    }

    public function coachs()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public function mentors()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function pendampings()
    {
        return $this->belongsTo(Pendamping::class, 'pendamping_id');
    }

    public function jadwalPendampingans()
    {
        return $this->hasMany(JadwalPendampingan::class);
    }

    public function formPendampingans()
    {
        return $this->hasMany(FormPendampingan::class);
    }

    public function materiPendampingans()
    {
        return $this->hasMany(MateriPendampingan::class);
    }

    public function jadwalCoachings()
    {
        return $this->hasMany(JadwalCoaching::class);
    }

    public function materiCoachings()
    {
        return $this->hasMany(MateriCoaching::class);
    }

    public function jadwalMentorings()
    {
        return $this->hasMany(JadwalMentoring::class);
    }

    public function materiMentorings()
    {
        return $this->hasMany(MateriMentoring::class);
    }

    public function formMentorings()
    {
        return $this->hasMany(FormMentoring::class);
    }

    public function coachings()
    {
        return $this->hasMany(Coaching::class);
    }
}
