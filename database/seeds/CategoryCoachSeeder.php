<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryCoach;

class CategoryCoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = CategoryCoach::create([
            'kode_coach' => 'CH1',
            'kategori_coach' => 'Dosen'
        ]);

        $category = CategoryCoach::create([
            'kode_coach' => 'CH2',
            'kategori_coach' => 'Eksternal'
        ]);
    }
}
