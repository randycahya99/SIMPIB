<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormPendampingan extends Model
{
    protected $table = 'form_pendampingan';
    protected $fillable = [
        'tanggal',
        'perihal',
        'sdm_total',
        'sdm_lepas',
        'status_inkubator',
        'luas_bangunan',
        'kepemilikan_teknologi',
        'target_akhir_tahun',
        'target_saat_ini',
        'jumlah_anggaran_ppbt',
        'anggaran_inkubator',
        'jumlah_produksi',
        'jumlah_penjualan',
        'harga_produksi',
        'harga_produksi_unit',
        'harga_jual_unit',
        'perijinan_perusahaan',
        'perijinan_produk',
        'nama_mesin',
        'jumlah_mesin',
        'total_nilai_mesin',
        'inkubator_produk',
        'inkubator_bisnis',
        'inkubator_administrasi',
        'lama_kontrak',
        'masalah_administrasi',
        'tenant_id',
        'pendamping_id'
    ];

    public function tenants()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function pendampings()
    {
        return $this->belongsTo(Pendamping::class, 'pendamping_id');
    }
}
