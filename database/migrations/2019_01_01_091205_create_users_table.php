<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('uid');
             $table->string('user_name');
           $table->string('first_name');
             $table->string('last_name');
             $table->string('photo');
             $table->string('photo_rec');
             $table->string('hash');
             $table->text('roles'); // потом изменить на айди роли
             $table->binary('is_active');
             $table->string('registration_ip');
             $table->string('email');
             $table->timestamp('email_verified_at')->nullable();
             $table->string('password');
             $table->string('last_ip');
             $table->text('user_ips');
             $table->dateTime('registration_time');
             $table->integer('referrals_id');
             $table->string('referral_link');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
