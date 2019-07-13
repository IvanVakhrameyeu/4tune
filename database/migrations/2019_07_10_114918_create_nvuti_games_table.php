<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNvutiGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nvuti_games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('time');
            $table->string('status');
            $table->string('game_hash');
            $table->string('game_salt');
            $table->double('game_number');
            $table->timestamps();
        });
        Schema::table('nvuti_games', function (Blueprint $table) {

            $table->integer('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nvuti_games');
    }
}
