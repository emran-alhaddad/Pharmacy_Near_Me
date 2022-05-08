<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 1; $i <=27; $i++) {

        //     // $table->id();
        //     // $table->unsignedBigInteger('request_id');
        //     // $table->string('message')->nullable();
        //     // $table->integer('state')->default(ReplyState::WAIT_ACCEPTANCE);
        //     // $table->foreign('request_id')->references('id')->on('requests');
        //     // $table->timestamps();

        //     $reply = new Reply();
        //     $reply->request_id = 

        //     // $table->id();
        //     // $table->unsignedBigInteger('reply_id');
        //     // $table->unsignedBigInteger('request_details_id');
        //     // $table->unsignedDouble('drug_price')->nullable();
        //     // $table->string('alt_drug_image')->nullable();
        //     // $table->string('alt_drug_title')->nullable();
        //     // $table->unsignedDouble('alt_drug_price')->nullable();
        //     // $table->integer('state')->default(ReplyState::WAIT_ACCEPTANCE);
        //     // $table->foreign('reply_id')->references('id')->on('replies');

        //         for ($j=0; $j < 10; $j++) { 
        //             $order_request = new OrderRequest();
        //         $order_request->client_id = $i;
        //         $order_request->pharmacy_id = $i-10;
        //         if ($order_request->save()) {
        //             DB::table('request__details')->insert([
        //                 'request_id' => $order_request->id,
        //                 'drug_title' => Str::random(15),
        //                 'quantity' => $i * $i,
        //                 'accept_alternative' => true,
        //                 'repeat_every' => $i * $i,
        //                 'repeat_until' => Carbon::now()->toDateTime(),
        //             ]);
        //         }
        //         }
            
        // }
    }
}
