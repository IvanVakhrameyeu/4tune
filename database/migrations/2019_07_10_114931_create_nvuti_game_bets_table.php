<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNvutiGameBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nvuti_game_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numbers_range');
           // $table->string('game_type');
            //        $table->integer('game_id');
            $table->double('amount');
            $table->string('currency');
            //$table->dateTime('bet_time');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('nvuti_game_bets', function (Blueprint $table) {
            $table->integer('user_id')->references('id')->on('users');
             $table->integer('game_id')->references('id')->on('nvuti_games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nvuti_game_bets');
    }
}
