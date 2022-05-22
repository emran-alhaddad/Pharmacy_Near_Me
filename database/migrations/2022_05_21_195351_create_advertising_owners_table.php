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
        Schema::create('advertising_owners', function (Blueprint $table) {
            $table->id();           
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('advertising_id')->nullable();
            $table->integer('is_active')->default(0);
            $table->foreign('advertising_id')->references('id')->on('advertisings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertising_owners');
    }
};
