<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);
        // $this->call(SponsorshipSeeder::class);
        $this->call(AccomodationSeeder::class);
        $this->call(ViewSeeder::class);
        $this->call(MessageSeeder::class);
    }
}
