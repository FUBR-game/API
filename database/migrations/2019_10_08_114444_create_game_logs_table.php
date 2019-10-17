<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('event_type');
            $table->text('event_data');
            $table->dateTime('event_triggered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_logs');
    }
}
