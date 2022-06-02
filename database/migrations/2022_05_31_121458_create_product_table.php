<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product');
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('order_index')->default(0);
            $table->decimal('price')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0. hide 1. active');
            $table->string('desc')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
