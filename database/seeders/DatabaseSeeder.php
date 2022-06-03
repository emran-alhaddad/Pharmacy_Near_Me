<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RolesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(ClientsSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(ZonesSeeder::class);
        $this->call(PharmaciesSeeder::class);
        $this->call(RequestsSeeder::class);
        $this->call(CompliantsSeeder::class);
        $this->call(WebSiteSeeder::class);

    }
}
