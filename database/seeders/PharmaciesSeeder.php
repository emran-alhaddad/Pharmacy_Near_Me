<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PharmaciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {

            $user = new User();
            $user->name = Str::random(8);
            $user->email = Str::random(12) . '@gmail.com';
            $user->password = Hash::make('123456789');
            $user->is_active = 1;
            if ($user->save()) {
                $user->attachRole('pharmacy');
                Pharmacy::create([
                    'user_id' => $user->id,
                    'zone_id' => $i
                ]);
            }
        }

        for ($i = 1; $i <= 10; $i++) {

            $user = new User();
            $user->name = Str::random(8);
            $user->email = Str::random(12) . '@gmail.com';
            $user->password = Hash::make('123456789');
            $user->is_active = 1;
            if ($user->save()) {
                $user->attachRole('pharmacy');
                Pharmacy::create([
                    'user_id' => $user->id,
                    'zone_id' => $i
                ]);
            }
        }

        for ($i = 20; $i <= 50; $i++) {

            $user = new User();
            $user->name = Str::random(8);
            $user->email = Str::random(12) . '@gmail.com';
            $user->password = Hash::make('123456789');
            $user->is_active = 1;
            if ($user->save()) {
                $user->attachRole('pharmacy');
                Pharmacy::create([
                    'user_id' => $user->id,
                    'zone_id' => $i
                ]);
            }
        }
        

    }
}
