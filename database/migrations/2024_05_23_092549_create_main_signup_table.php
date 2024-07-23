<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainSignupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_signup', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('username');
            $table->string('password');
            $table->string('pass');
            $table->string('name');
            $table->string('mob');
            $table->string('mail');
            $table->string('address');
            $table->string('actnum');
            $table->string('userlevel');
            $table->string('signupdate');
            $table->string('lastlogin');
            $table->string('lastloginfail');
            $table->string('numloginfail');
            $table->string('stat')->default('0');
            $table->string('edt');
            $table->string('edtm');
            $table->string('eby');
            $table->string('udt');
            $table->string('udtm');
            $table->string('uby');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_signup');
    }
}
