<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesPlayedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_played', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('game_id');

            $table->primary(['user_id', 'game_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_played');
    }
}
