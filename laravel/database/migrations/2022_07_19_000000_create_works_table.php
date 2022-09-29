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
            $table->string('subimage_4')
                ->default('')
                ->comment("서브이미지4");
            $table->string('subimage_5')
                ->default('')
                ->comment("서브이미지5");
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
        Schema::dropIfExists('works');
    }
}