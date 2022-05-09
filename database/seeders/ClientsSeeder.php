<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {    $user = new User();
        $user->name = " اسامة مجفوظ";
        $user->email = 'client1@gmail.com';
        $user->password = Hash::make('client');
        $user->email_verified_at = Carbon::now()->timestamp;
        $user->is_active = 1;
        if ($user->save()) {
            $user->attachRole('client');
            Client::create([
                'user_id' => $user->id
            ]); 
        }

        $user = new User();
        $user->name = " رشاد مجفوظ";
        $user->email = 'client2@gmail.com';
        $user->password = Hash::make('client');
        $user->email_verified_at = Carbon::now()->timestamp;
        $user->is_active = 1;
        if ($user->save()) {
            $user->attachRole('client');
            Client::create([
                'user_id' => $user->id
            ]); 
        }



        
        $filePathName=base_path().'\names\users.txt';
        $filePathEmail=base_path().'\names\client_email.txt';
        $fileName = fopen($filePathName, "r");
        $fileEmail = fopen($filePathEmail, "r");
        
        $x=0;
        while (($line = fgets($fileName)) !== false) 
        {
            
            $user = new User();
            $user->password = Hash::make('123456789');
            $user->is_active = 1;
             $user->name = trim($line);
            $user->email =fgets($fileEmail);
                   
       
        if ($user->save()) {
            $user->attachRole('client');
            Client::create([
                'user_id' => $user->id
            ]); 
       //     dd($user);
     }
    }
  
        // for ($i = 1; $i <= 10; $i++) {
 
        //     $user = new User();
        //     $user->name = Str::random(8);
        //     $user->email = Str::random(12) . '@gmail.com';
        //     $user->password = Hash::make('123456789');
        //     $user->is_active = 1;
        //     if ($user->save()) {
        //         $user->attachRole('client');
        //         Client::create([
        //             'user_id' => $user->id
        //         ]);
        //     }
        // }
    }
}
