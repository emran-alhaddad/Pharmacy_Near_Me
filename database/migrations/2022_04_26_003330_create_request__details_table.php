<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->unsignedInteger('stats');
            $table->unsignedInteger('quantity');
           
            $table->string('drug_image');
            $table->string('drug_title');
            $table->unsignedInteger('repeat_every');
            $table->boolean('accept_alternative');
            $table->datetime('repeat_until');

            
            $table->foreign('request_id')->references('id')->on('requests');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request__details');
    }
};
