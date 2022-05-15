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
            $table->string('name');
            $table->string('logo');
            $table->string('image')->nullable();
            $table->string('title_about');
            $table->text('descripe_about');
            $table->string('descripe_main');
            $table->string('descripe_ser_client')->nullable();;
            $table->string('descripe_ser_phar')->nullable();;
            $table->string('descripe_ser_user')->nullable();
         
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
