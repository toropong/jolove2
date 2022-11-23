<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('userid')->comment('아이디')->default('');
            $table->string('name')->comment('이름')->default('');
            $table->string('email')->comment('이메일')->default('');
            $table->string('password')->comment('비밀번호')->default('');
            $table->string('c_num')->comment('전화번호')->default('');
            $table->string('level')->comment('등급')->default('1');
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
        Schema::table('users', function (Blueprint $table) {
        // $table->dropColumn('c_num');
        // $table->dropColumn('nickname');
            Schema::dropIfExists('users');
        });
    }
}