<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetTransportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('street_transport', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id');
            $table->integer('street_id');
            $table->integer('street_next_id')->nullable();
            $table->integer('street_prev_id')->nullable();
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
        Schema::dropIfExists('street_transport');
    }
}





