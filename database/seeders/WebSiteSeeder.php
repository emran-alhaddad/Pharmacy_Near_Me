<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\SiteAdmine;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WebSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $user = new SiteAdmine();
            $user->name = "علاجي";
            $user->address_main = 'أهلا بك في موقع علاجي';
            $user->descripe_main = 'نسعى لتحقيق أحلام عملائنا ، من خلال الجمع بين أفكارهم وحاجاتهم تجاربهم وتجربتنا الخاصة.';
            $user->logo ='logo.jpeg'; 
            $user->twitter ='https://www.twitter.com/';
            $user->whatsup ='736990516';
            $user->email ='Pharmicy@gmail.com';
            $user->phone ='736990516';
            $user->facebook ='https://www.facebook.com/';
            $user->title_about ='موقع يلبي تطلعاتك';
            $user->descripe_about ='علاجي هو موقع وسيط يربط بين الصيدلية ك مقدم خدمة وبين المستخدم اللذي يتطلع للحصول على خدمة من الصيدلية يمكنك الاطلاع على التفاصيل ضمن الفئة التي تنمتمي اليها في الأسفل ';
            $user->save(); 

           
    }
}
