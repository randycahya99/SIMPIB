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
            'kode' => 'TH1',
            'tahap_inkubasi' => 'Pra Inkubasi'
        ]);

        $tahap = TahapInkubasi::create([
            'kode' => 'TH2',
            'tahap_inkubasi' => 'Inkubasi'
        ]);

        $tahap = TahapInkubasi::create([
            'kode' => 'TH3',
            'tahap_inkubasi' => 'Pasca Inkubasi'
        ]);
    }
}
