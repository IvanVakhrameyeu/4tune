<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusProgramInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bonus_program_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_bonus_program_id')->unsigned();
            $table->json('progress');
            $table->integer('level')->default(1);
            $table->string('status');
            $table->json('bonus_history');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bonus_program_id')->references('id')->on('bonus_programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_program_infos');
    }
}
