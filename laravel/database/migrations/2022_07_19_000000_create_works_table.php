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