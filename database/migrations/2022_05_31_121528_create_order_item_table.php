<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('order_item');
        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('order_id')->default(0)->unsigned();
            $table->integer('product_id')->default(0)->unsigned();
            $table->decimal('price')->default(0);
            $table->tinyInteger('quanity')->default(0);
            $table->decimal('amount')->default(0);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
