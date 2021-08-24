<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryTenant;

class CategoryTenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = CategoryTenant::create([
            'kode_tenant' => 'TNT1',
            'kategori_tenant' => 'Calon Tenant'
        ]);

        $category = CategoryTenant::create([
            'kode_tenant' => 'TNT2',
            'kategori_tenant' => 'Startup'
        ]);

        $category = CategoryTenant::create([
            'kode_tenant' => 'TNT3',
            'kategori_tenant' => 'UMKM'
        ]);
    }
}
