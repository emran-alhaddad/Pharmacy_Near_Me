<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'display_name' => 'مدير الموقع',
            'description' => 'مالك النظام الأساسي'
        ]);

        Role::create([
            'name' => 'pharmacy',
            'display_name' => 'مقدم خدمة',
            'description' => 'صاحب صيدلية يقدم خدماتة'
        ]);

        Role::create([
            'name' => 'client',
            'display_name' => 'عميل',
            'description' => 'عميل يطلب خدمة معينة'
        ]);
    }
}
