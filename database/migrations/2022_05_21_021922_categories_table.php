<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('name');
            $table->string('link')->index();
            $table->integer('parent_id')->default(0);
            $table->tinyInteger('type')->default(0)->comment('0. Tin tức 1. Sản phẩm 2. Signle Page');
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
        Schema::dropIfExists('category');
    }
}
