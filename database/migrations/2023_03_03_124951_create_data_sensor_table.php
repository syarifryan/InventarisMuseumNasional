<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sensor', function (Blueprint $table) {
            $table->id();
            $table->float('co')->comment('Karbon Monoksida');
            $table->float('nh3')->comment('Amonia');
            $table->float('no2')->comment('Nitrogen Dioksida');
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
        Schema::dropIfExists('data_sensor');
    }
}
