<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('menuName');
            $table->string('pageUrl')->nullable();
            $table->string('rootOrder');
            $table->string('menuOrder')->default('0');
            $table->string('user')->nullable();
            $table->string('stat')->default('0');
            $table->string('edt')->nullable();
            $table->string('edtm')->nullable();
            $table->string('eby')->nullable();
            $table->string('udt')->nullable();
            $table->string('udtm')->nullable();
            $table->string('uby')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_menu');
    }
}
