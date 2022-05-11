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
        Schema::create('site_admines', function (Blueprint $table) {
            $table->id();
            $table->string('address_main');
            $table->string('descripe_main');
            $table->string('descripe_ser_client');
            $table->string('descripe_ser_phar');
            $table->string('descripe_ser_user');
            $table->string('name');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('whatsup');
            $table->string('google');
            $table->string('phone');
           
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('site_admines');
    }
};
