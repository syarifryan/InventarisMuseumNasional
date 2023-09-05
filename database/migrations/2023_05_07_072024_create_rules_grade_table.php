<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_grade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proses_id')->nullable();
            $table->unsignedBigInteger('rules_id');
            $table->float('co')->nullable();
            $table->float('nh3')->nullable();
            $table->float('no2')->nullable();
            $table->string('grade')->nullable();
            $table->float('inf')->nullable();
            $table->float('nilai_min')->nullable();
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
        Schema::dropIfExists('rules_grade');
    }
}
