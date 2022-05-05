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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->timestamps()->useCurrent();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->string('message');
            $table->foreign('client_id')->references('user_id')->on('clients');
            $table->foreign('pharmacy_id')->references('user_id')->on('pharmacies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};
