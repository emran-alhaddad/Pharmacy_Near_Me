<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\User;
use Carbon\Carbon;
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

        $user = new User();
        $user->name = "صيدلية الحداد";
        $user->email = 'emranhadad770774255770774255@gmail.com';
        $user->password = Hash::make('phar');
        $user->email_verified_at = Carbon::now()->timestamp;
        $user->is_active = 1;
        if ($user->save()) {
            $user->attachRole('pharmacy');
            Pharmacy::create([
                'user_id' => $user->id,
                'zone_id' => 1
            ]);
        }

        $user = new User();
        $user->name = "  حنين";
        $user->email = 'phar@gmail.com';
        $user->password = Hash::make('phar');
        $user->email_verified_at = Carbon::now()->timestamp;
        $user->is_active = 1;
        if ($user->save()) {
            $user->attachRole('pharmacy');
            Pharmacy::create([
                'user_id' => $user->id,
                'zone_id' => 1
            ]);
        }
       
        
        
        $filePathName=base_path().'\names\phar.txt';
        $filePathEmail=base_path().'\names\email.txt';
        $fileName = fopen($filePathName, "r");
        $fileEmail = fopen($filePathEmail, "r");
        
        $x=1;
        while (($line = fgets($fileName)) !== false ) 
        {
            $user = new User();
            $user->password = Hash::make('123456789');
            $user->is_active = 1;
             $user->name = trim($line);
            $user->email =fgets($fileEmail);
            $user->email_verified_at = Carbon::now()->timestamp;
            if($x==20)
            $x=1;      
                   
      
            if ($user->save()) {
                        $user->attachRole('pharmacy');
                        Pharmacy::create([
                            'user_id' => $user->id,
                            'zone_id' => $x
                        ]);
                    }
                    $x++;
    }
  

        // for ($i = 1; $i <= 20; $i++) {

        //     $user = new User();
        //     $user->name = Str::random(8);
        //     $user->email = Str::random(12) . '@gmail.com';
        //     $user->password = Hash::make('123456789');
        //     $user->email_verified_at = Carbon::now()->timestamp;
        //     $user->is_active = 1;
        //     if ($user->save()) {
        //         $user->attachRole('pharmacy');
        //         Pharmacy::create([
        //             'user_id' => $user->id,
        //             'zone_id' => $i
        //         ]);
        //     }
        // }

        // for ($i = 1; $i <= 10; $i++) {

        //     $user = new User();
        //     $user->name = Str::random(8);
        //     $user->email = Str::random(12) . '@gmail.com';
        //     $user->password = Hash::make('123456789');
        //     $user->is_active = 1;
        //     if ($user->save()) {
        //         $user->attachRole('pharmacy');
        //         Pharmacy::create([
        //             'user_id' => $user->id,
        //             'zone_id' => $i
        //         ]);
        //     }
        // }

        // for ($i = 20; $i <= 50; $i++) {

        //     $user = new User();
        //     $user->name = Str::random(8);
        //     $user->email = Str::random(12) . '@gmail.com';
        //     $user->password = Hash::make('123456789');
        //     $user->is_active = 1;
        //     if ($user->save()) {
        //         $user->attachRole('pharmacy');
        //         Pharmacy::create([
        //             'user_id' => $user->id,
        //             'zone_id' => $i
        //         ]);
        //     }
        // }
        

    }
}
