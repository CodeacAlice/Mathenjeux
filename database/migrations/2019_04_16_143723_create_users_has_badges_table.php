<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_badges', function (Blueprint $table) {
            $table->integer('users_id');
            $table->integer('badges_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('badges_id')->references('id')->on('badges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_has_badges');
    }
}
