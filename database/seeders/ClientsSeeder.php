<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {    
        
        $user = new User();
        $user->name = "العميل 1";
        $user->email = 'emranhadad770774255770774255@gmail.com';
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
        $user->name = " اسامة الوافي";
        $user->email = 'client@gmail.com';
        $user->password = Hash::make('client');
        $user->email_verified_at = Carbon::now()->timestamp;
        $user->is_active = 1;
        if ($user->save()) {
            $user->attachRole('client');
            Client::create([
                'user_id' => $user->id
            ]); 
        }

        
        
        
        $filePathName= Storage::path('public/names/users.txt');
        $filePathEmail=Storage::path('public/names/client_email.txt');
        $fileName = fopen($filePathName, "r");
        $fileEmail = fopen($filePathEmail, "r");
        
        $x=0;
        while (($line = fgets($fileName)) !== false) 
        {
            $user = new User();
            $user->password = Hash::make('123456789');
            $user->is_active = 1;
             $user->name = $line;
            $user->email =fgets($fileEmail);
                   
       
        if ($user->save()) {
            $user->attachRole('client');
            Client::create([
                'user_id' => $user->id
            ]); 
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
