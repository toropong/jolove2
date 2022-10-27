<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('likes');
        Schema::create('likes', function (Blueprint $table) {
            $table->id('l_no')->comment('좋아요 기본키');
            //외래키
            $table->unsignedBigInteger('u_no');
            $table->foreign('u_no')->references('id')->on('users');

            $table->unsignedBigInteger('w_no');
            $table->foreign('w_no')->references('no')->on('works');
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
        Schema::dropIfExists('likes');
    }
}
