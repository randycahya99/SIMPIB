<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BidangKeahlianSeeder::class);
        $this->call(CategoryCoachSeeder::class);
        $this->call(CategoryMentorSeeder::class);
        $this->call(CategoryPendampingSeeder::class);
        $this->call(CategoryTenantSeeder::class);
        $this->call(TahapInkubasiSeeder::class);
    }
}
