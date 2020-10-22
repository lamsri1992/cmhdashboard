<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->string('fullname');
            $table->string('level');
            $table->string('active');
            $table->string('dlevel');
            $table->string('ccard');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_admins');
    }
}
