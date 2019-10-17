<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_results', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('game_id');

            $table->primary(['user_id', 'game_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('game_id')->references('id')->on('games');

            $table->unsignedSmallInteger('rank');
            $table->unsignedSmallInteger('kills');
            $table->boolean('has_died');
            $table->unsignedSmallInteger('dbno');
            $table->unsignedInteger('damage_dealt');
            $table->unsignedInteger('damage_taken');
            $table->unsignedInteger('health_regained');
            $table->unsignedInteger('mana_spend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_results');
    }
}
