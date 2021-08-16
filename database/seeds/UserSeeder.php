<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengelola = User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $pengelola->assignRole('admin');
    }
}
