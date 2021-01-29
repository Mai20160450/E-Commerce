<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('code');
            $table->string('quantity');
            $table->text('details');
            $table->string('color');
            $table->string('size');
            $table->string('sellingPrice')->nullable();
            $table->string('discountPrice')->nullable();
            $table->string('videoLink')->nullable();
            $table->integer('mainSlider')->nullable();
            $table->integer('hotDeal')->nullable();
            $table->integer('bestRated')->nullable();
            $table->integer('midSlider')->nullable();
            $table->integer('hotNew')->nullable();
            $table->integer('trend')->nullable();
            $table->string('imageOne')->nullable();
            $table->string('imageTwo')->nullable();
            $table->string('imageThree')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('products');
    }
}
