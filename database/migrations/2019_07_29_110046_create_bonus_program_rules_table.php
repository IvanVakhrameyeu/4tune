<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusProgramRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_program_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bonus_program_id');
            $table->json('rules');
            $table->timestamps();

            $table->foreign('bonus_program_id')->referrenses('id')->on('bonus_programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_program_rules');
    }
}
