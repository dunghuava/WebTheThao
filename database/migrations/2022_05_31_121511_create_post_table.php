<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('post');
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('desc')->nullable();
            $table->text('content')->nullable();
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('user_id')->default(0);
            $table->tinyInteger('order_index')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0. hide 1. active');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('post');
    }
}
