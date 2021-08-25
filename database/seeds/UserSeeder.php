<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Pengelola;
use App\Models\Coach;
use App\Models\Mentor;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin atau Pengelola
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


        //Pendamping
        $pendamping = User::create([
            'username' => 'pendamping',
            'email' => 'pendamping@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $pendamping->assignRole('pendamping');


        //Mentor
        $userMentor = User::create([
            'username' => 'mentor',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $mentor = Mentor::create([
            'nama_mentor' => 'Arief Kelik Nugroho, S.Kom., M.Cs.',
            'alamat' => 'Purbalingga',
            'no_hp' => '081931779152',
        ]);

        $userMentor->mentors()->save($mentor);
        $userMentor->assignRole('mentor');


        //Coach
        $userCoach = User::create([
            'username' => 'coach',
            'email' => 'coach@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $coach = Coach::create([
            'nama_coach' => 'Dr. Lasmedi Afuan, S.T., M.Cs.',
            'alamat' => 'Purwokerto',
            'no_hp' => '082137371349',
        ]);

        $userCoach->coachs()->save($coach);
        $userCoach->assignRole('coach');


        //Pemonev
        $pemonev = User::create([
            'username' => 'pemonev',
            'email' => 'pemonev@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $pemonev->assignRole('pemonev');


        //Perusahaan
        $perusahaan = User::create([
            'username' => 'perusahaan',
            'email' => 'perusahaan@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $perusahaan->assignRole('perusahaan');


        //Tenant
        $tenant = User::create([
            'username' => 'tenant',
            'email' => 'tenant@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $tenant->assignRole('tenant');
    }
}
