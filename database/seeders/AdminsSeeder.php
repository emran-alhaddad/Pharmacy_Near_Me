<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $user = new User();
            $user->name = "عمران الحداد";
            $user->email = 'admin@gmail.com';
            $user->password = Hash::make('admin');
            $user->email_verified_at = Carbon::now()->timestamp;
            $user->is_active = 1;
            if ($user->save()) {
                $user->attachRole('admin');
                Admin::create([
                    'user_id' => $user->id,
                ]);
            }
    }
}
