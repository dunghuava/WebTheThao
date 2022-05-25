<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product',function(Blueprint $table){
            $table->string('id')->index();
            $table->string('name');
            $table->string('link')->index();
            $table->integer('category')->default(0);
            $table->text('detail')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0. Ẩn 1. Kích hoạt');
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
        //
    }
}
