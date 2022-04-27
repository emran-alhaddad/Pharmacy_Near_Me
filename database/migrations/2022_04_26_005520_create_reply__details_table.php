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
        Schema::create('reply__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reply_id');
            $table->unsignedBigInteger('request_details_id');
            $table->unsignedDouble('drug_price')->nullable();
            $table->string('alt_drug_image')->nullable();
            $table->string('alt_drug_title')->nullable();
            $table->unsignedDouble('alt_drug_price')->nullable();
            $table->unsignedInteger('state')->default(0);
            $table->foreign('reply_id')->references('id')->on('replies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply__details');
    }
};
