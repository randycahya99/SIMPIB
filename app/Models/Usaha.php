<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'usaha';
    protected $fillable = [
        'nama_usaha',
        'produk',
        'bentuk_badan',
        'kategori_usaha',
        'mulai_usaha',
        'alamat_usaha',
        'kode_pos_usaha',
        'no_hp_usaha',
        'email_usaha',
        'website_usaha',
        'modal',
        'omzet_1',
        'omzet_2',
        'omzet_3',
        'profit_1',
        'profit_2',
        'profit_3',
        'modal_sendiri',
        'modal_keluarga',
        'modal_investor',
        'modal_bank',
        'modal_total',
        'jumlah_cabang',
        'jumlah_pegawai',
        'perintis',
        'prestasi'
    ];

    public function users()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
