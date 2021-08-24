<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryPendamping;

class CategoryPendampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = CategoryPendamping::create([
            'kode_pendamping' => 'PD1',
            'kategori_pendamping' => 'Dosen'
        ]);

        $category = CategoryPendamping::create([
            'kode_pendamping' => 'PD2',
            'kategori_pendamping' => 'Eksternal'
        ]);
    }
}
