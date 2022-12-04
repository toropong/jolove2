<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id('no');
            $table->string('year')
                ->default('')
                ->comment("년도");
            $table->string('title')
                ->default('')
                ->comment("제목");
            $table->string('cont')
                ->default('')
                ->comment("내용글");
            $table->string('filename')
                ->default('')
                ->comment("파일");
            $table->string('subimage_1')
                ->default('')
                ->comment("서브이미지");
            $table->string('subimage_2')
                ->default('')
                ->comment("서브이미지2");
            $table->string('subimage_3')
                ->default('')
                ->comment("서브이미지3");
                $table->string('video')
                ->default('')
                ->comment("시연영상");
            $table->unsignedInteger('p_like')->default(0)
                ->comment("추천수");
            $table->unsignedInteger('visit_count')->default(0) 
                 ->comment("조회수");
            $table->timestamps();
            
            //외래키

            $table->unsignedBigInteger('u_no')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('u_no')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}