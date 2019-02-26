<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterStationForegin extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->foreign('departure_station')->references('code')->on('locations')->onDelete('cascade');
            $table->foreign('arrival_station')->references('code')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign(['departure_station','arrival_station']);
            $table->dropColumn(['departure_station','arrival_station']);
        });
    }
}
