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
        Schema::create('pharmacies', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id');
        $table->string('images')->nullable();
        $table->string('license')->nullable();
        $table->string('description')->nullable();
        $table->unsignedBigInteger('zone_id');
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('zone_id')->references('id')->on('zones');

        $table->primary('user_id');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacies');
    }
};
