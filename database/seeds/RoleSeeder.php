<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin'
        ]);

        $role = Role::create([
            'name' => 'coach'
        ]);

        $role = Role::create([
            'name' => 'mentor'
        ]);

        $role = Role::create([
            'name' => 'pemonev'
        ]);

        $role = Role::create([
            'name' => 'pendamping'
        ]);

        $role = Role::create([
            'name' => 'perusahaan'
        ]);

        $role = Role::create([
            'name' => 'tenant'
        ]);
    }
}
