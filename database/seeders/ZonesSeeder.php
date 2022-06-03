<?php

namespace Database\Seeders;

use App\Models\zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
        $filePathName=Storage::path('public/names/zones.txt');
       
        $fileName = fopen($filePathName, "r");
        $x=1;
        while (($line = fgets($fileName)) !== false) 
        {
           if($x==3)
            $x=1;
            zone::create([
                'city_id' => $x,
                'name' => $line
            ]);
            $x++;
         }
        // for ($i = 1; $i <= 20; $i++) {
        //     zone::create([
        //         'city_id' => $i,
        //         'name' => Str::random(8)
        //     ]);
        // }

        // for ($i = 1; $i <= 20; $i++) {
        //     zone::create([
        //         'city_id' => $i,
        //         'name' => Str::random(8)
        //     ]);
        // }

        // for ($i = 1; $i <= 20; $i++) {
        //     zone::create([
        //         'city_id' => $i,
        //         'name' => Str::random(8)
        //     ]);
        // }
    }
}
