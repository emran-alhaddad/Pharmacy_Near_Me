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
        Schema::create('notifications', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            // $table->string('type');
            // $table->morphs('notifiable');
            // $table->text('data');
            // $table->timestamp('read_at')->nullable();
            // $table->timestamps();

            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('pharmacy_id')->references('id')->on('users');
            $table->string('message');
            $table->string('type');
            $table->string('link');
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
        Schema::dropIfExists('notifications');
    }
};
