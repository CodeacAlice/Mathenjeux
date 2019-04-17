<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsofusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levelsofusers', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('level');
            $table->integer('pointsneeded');
            $table->integer('titlesofusers_id');
            $table->foreign('titlesofusers_id')->references('id')->on('titlesofusers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levelsofusers');
    }
}
