<?php

use Illuminate\Database\Seeder;
use App\Models\BidangKeahlian;

class BidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'AGRI',
            'bidang_keahlian' => 'Agribisnis'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'AGRO',
            'bidang_keahlian' => 'Agroteknologi'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'BM',
            'bidang_keahlian' => 'Bisnis dan Manajemen'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'DR',
            'bidang_keahlian' => 'Kedokteran'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'EN',
            'bidang_keahlian' => 'Energi'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'INF',
            'bidang_keahlian' => 'Informatika'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'LAUT',
            'bidang_keahlian' => 'Kelautan'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'KES',
            'bidang_keahlian' => 'Kesehatan'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'WST',
            'bidang_keahlian' => 'Pariwisata'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'IKAN',
            'bidang_keahlian' => 'Perikanan'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'TMBG',
            'bidang_keahlian' => 'Pertambangan'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'SN',
            'bidang_keahlian' => 'Seni'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'TIK',
            'bidang_keahlian' => 'Teknologi Informasi dan Komunikasi'
        ]);

        $bidang = BidangKeahlian::create([
            'kode_bidang' => 'TR',
            'bidang_keahlian' => 'Terknologi dan Rekayasa'
        ]);
    }
}
