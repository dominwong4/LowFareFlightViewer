<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlightsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {

            $table->increments('id');
            $table->string('departure_station');
            $table->string('arrival_station');
            $table->decimal('amount');
            $table->boolean('status');
            $table->date('flight_date');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('flights');
    }
}
