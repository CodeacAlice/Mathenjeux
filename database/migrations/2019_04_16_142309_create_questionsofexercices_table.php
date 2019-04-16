<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsofexercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionsofexercices', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('question', 255);
            $table->string('hint', 255);
            $table->string('answer', 255);
            $table->string('correction', 255);
            $table->integer('order');
            $table->integer('exercices_id');
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
        Schema::dropIfExists('questionsofexercices');
    }
}
