<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVkAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vk_accounts', function (Blueprint $table) {
            $table->integer('uid')->primary();
            $table->string('nickname')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('token');
            $table->dateTime('expires_in');
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['uid', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vk_accounts');
    }
}
