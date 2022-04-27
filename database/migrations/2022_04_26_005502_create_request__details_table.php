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
            $table->string('drug_image')->nullable();
            $table->string('drug_title')->nullable();
            $table->unsignedInteger('quantity'); 
            $table->boolean('accept_alternative')->default(false);
            $table->unsignedInteger('repeat_every')->nullable(); 
            $table->unsignedInteger('repeat_until')->nullable(); 
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
