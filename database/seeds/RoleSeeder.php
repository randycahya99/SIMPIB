<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'pendamping',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'mentor',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'coach',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'pemonev',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'perusahaan',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'tenant',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'calon tenant',
            'guard_name' => 'web'
        ]);
    }
}
