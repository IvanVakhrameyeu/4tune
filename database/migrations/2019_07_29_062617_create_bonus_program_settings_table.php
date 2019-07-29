<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusProgramSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_program_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bonus_program_id')->unsigned()->unique();
            $table->enum('bonus_program_type', ['deposit', 'withdraw', 'free', 'referral']);
            $table->string('code', 36)->index();
            $table->dateTime('end_time');
            $table->timestamps();

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
        Schema::dropIfExists('bonus_program_settings');
    }
}
