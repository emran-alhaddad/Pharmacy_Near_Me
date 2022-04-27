<?php

namespace Database\Seeders;

use App\Models\Request as OrderRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 1; $j <= 5; $j++) {

            for ($i = 1; $i <= 5; $i++) {

                $order_request = new OrderRequest();
                $order_request->client_id = $i + 61;
                $order_request->pharmacy_id = $j;
                if ($order_request->save()) {
                    DB::table('request__details')->insert([
                        'request_id' => $order_request->id,
                        'drug_title' => Str::random(15),
                        'quantity' => $i * $i,
                        'accept_alternative' => true,
                        'repeat_every' => $i * $i,
                        'repeat_until' => $i * $i + 10,
                    ]);
                }
            }
        }
    }
}
