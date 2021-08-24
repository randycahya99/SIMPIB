<?php

use Illuminate\Database\Seeder;
use App\Models\TahapInkubasi;

class TahapInkubasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tahap = TahapInkubasi::create([
            'kode' => 'TNT1',
            'tahap_inkubasi' => 'Calon Tenant'
        ]);

        $tahap = TahapInkubasi::create([
            'kode' => 'TNT2',
            'tahap_inkubasi' => 'Startup'
        ]);

        $tahap = TahapInkubasi::create([
            'kode' => 'TNT3',
            'tahap_inkubasi' => 'UMKM'
        ]);
    }
}
