<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('c_no')->comment('댓글');

            $table->string('c_comments')->default('')->comment('댓글내용');
            
            $table->unsignedBigInteger('u_no');
            $table->foreign('u_no')->references('id')->on('users');

            $table->unsignedBigInteger('w_no');
            $table->foreign('w_no')->references('no')->on('works');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
