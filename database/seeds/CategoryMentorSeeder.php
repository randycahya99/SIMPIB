<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryMentor;

class CategoryMentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = CategoryMentor::create([
            'kode_mentor' => 'MT1',
            'kategori_mentor' => 'Eksternal'
        ]);
    }
}
