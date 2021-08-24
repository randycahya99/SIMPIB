<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Pengelola;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPengelola = User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $pengelola = Pengelola::create([
            'nama_pengelola' => 'Taufik Budhi Pramono, S.Pi., M.Si.',
            'jabatan' => 'Kadiv Rekruitmen Tenant',
            'no_hp' => '08156984570'
        ]);

        $userPengelola->pengelolas()->save($pengelola);
        $userPengelola->assignRole('admin');


        $pendamping = User::create([
            'username' => 'pendamping',
            'email' => 'pendamping@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $pendamping->assignRole('pendamping');


        $mentor = User::create([
            'username' => 'mentor',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $mentor->assignRole('mentor');


        $coach = User::create([
            'username' => 'coach',
            'email' => 'coach@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $coach->assignRole('coach');


        $pemonev = User::create([
            'username' => 'pemonev',
            'email' => 'pemonev@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $pemonev->assignRole('pemonev');


        $perusahaan = User::create([
            'username' => 'perusahaan',
            'email' => 'perusahaan@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $perusahaan->assignRole('perusahaan');


        $tenant = User::create([
            'username' => 'tenant',
            'email' => 'tenant@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $tenant->assignRole('tenant');
    }
}
