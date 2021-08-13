<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $pengelola = User::create([
        //     'name' => 'Randy',
        //     'email' => 'tes@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'remember_token' => Str::random(60)
        // ]);

        // $pengelola->assignRole('admin');
    }
}
