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

            $table->unsignedBigInteger('u_no')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('u_no')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('w_no')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('w_no')->references('no')->on('works')->onDelete('cascade')->onUpdate('cascade');

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
