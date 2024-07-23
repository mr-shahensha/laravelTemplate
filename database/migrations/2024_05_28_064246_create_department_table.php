<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deptNm');
            $table->string('stat')->default('0');
            $table->string('edt');
            $table->string('edtm');
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
        Schema::dropIfExists('department');
    }
}
