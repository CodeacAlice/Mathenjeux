<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_exercices', function (Blueprint $table) {
            $table->integer('users_id');
            $table->integer('exercices_id');
            $table->integer('nboftries');
            $table->boolean('exerciceisfinished')->default(0);
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('users_has_exercices');
    }
}
