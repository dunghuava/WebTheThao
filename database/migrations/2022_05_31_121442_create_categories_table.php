<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categories');
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->tinyInteger('order_index')->default(0);
            $table->tinyInteger('parent_id')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0. hide 1. active');
            $table->tinyInteger('menu_top')->default(0);
            $table->tinyInteger('tyle')->default(0)->comment('0. post 1. product 2. single page 3. about');
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
        Schema::dropIfExists('categories');
    }
}
