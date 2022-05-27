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
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('request_id')->nullable();
            $table->foreign('sender_id')->references('id')->on('users');
            $table->string('message');
            $table->string('type');
            $table->string('image')->nullable();
            $table->string('nameFrom')->nullable();
            $table->string('nameTo')->nullable();
            $table->string('is_active')->default(1);
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
