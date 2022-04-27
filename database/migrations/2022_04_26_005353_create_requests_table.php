<?php

use App\Utils\RequestState;
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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedInteger('state')->default(RequestState::WAIT_ACCEPTANCE);
            $table->foreign('client_id')->references('user_id')->on('clients');
            $table->foreign('pharmacy_id')->references('user_id')->on('pharmacies');
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
        Schema::dropIfExists('requests');
    }
};
