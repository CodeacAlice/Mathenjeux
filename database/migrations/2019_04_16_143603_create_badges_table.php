<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('picture', 255);
            $table->integer('categoriesofbadges_id');
            $table->foreign('categoriesofbadges_id')->references('id')->on('categoriesofbadges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badges');
    }
}
