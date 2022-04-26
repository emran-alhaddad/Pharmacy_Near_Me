<?php

namespace Database\Seeders;

use App\Models\zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            zone::create([
                'city_id' => $i,
                'name' => Str::random(8)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            zone::create([
                'city_id' => $i,
                'name' => Str::random(8)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            zone::create([
                'city_id' => $i,
                'name' => Str::random(8)
            ]);
        }
    }
}
