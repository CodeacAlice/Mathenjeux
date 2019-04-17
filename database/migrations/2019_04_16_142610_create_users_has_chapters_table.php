<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_chapters', function (Blueprint $table) {
            $table->integer('users_id');
            $table->integer('chapters_id');
            $table->integer('progress')->default(0);
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('chapters_id')->references('id')->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_has_chapters');
    }
}
