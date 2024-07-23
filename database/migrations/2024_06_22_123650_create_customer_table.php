<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('custId');
            $table->string('custName');
            $table->string('custNumber');
            $table->string('custPan');
            $table->string('custAdress');
            $table->string('custCompany');
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
        Schema::dropIfExists('customer');
    }
}
