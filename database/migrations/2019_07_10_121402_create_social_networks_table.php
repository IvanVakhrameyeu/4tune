<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks', function (Blueprint $table) {
            $table->increments('id');
          //  $table->binary('status');
            $table->timestamps();
        });
     //   Schema::table('social_networks', function (Blueprint $table) {
     //       $table->foreign('user_id')->references('id')->on('users');
     //       $table->integer('vk_id')->references('id')->on('vk');
     //    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_networks');
    }
}
