<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CompliantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 23; $i <= 28; $i++) {
            for ($j = 1; $j <= 10; $j++) {

                $complaint = new Complaint();
                $complaint->client_id = $i;
                $complaint->pharmacy_id = $j;
                $complaint->message = Str::random(40);
                if ($i == 22 && $j <= 4)
                    $complaint->replay = Str::random(20);
                $complaint->save();
            }
        }
    }
}
