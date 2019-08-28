<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJackpotGameBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jackpot_game_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tickets_range');
            $table->double('amount');
            $table->integer('room_number');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('jackpot_game_bets', function (Blueprint $table) {
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('game_id')->references('id')->on('jackpot_games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jackpot_game_bets');
    }
}
