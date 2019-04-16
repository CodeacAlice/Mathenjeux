<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title', 255);
            $table->boolean('iscomplete')->default(0);
            $table->string('link', 255)->default('/chap');
            $table->text('content')->nullable();
            $table->integer('order');
            $table->integer('fields_id');
            $table->foreign('fields_id')->references('id')->on('fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
