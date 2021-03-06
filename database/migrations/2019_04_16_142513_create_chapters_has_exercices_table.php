<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersHasExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters_has_exercices', function (Blueprint $table) {
            $table->integer('chapters_id');
            $table->integer('exercices_id');
            $table->foreign('chapters_id')->references('id')->on('chapters');
            $table->foreign('exercices_id')->references('id')->on('exercices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters_has_exercices');
    }
}
