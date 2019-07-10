<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoubleGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('double_games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('time');
            $table->string('status');
            $table->string('game_hash');
            $table->string('game_salt');
            $table->double('game_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('double_games');
    }
}
