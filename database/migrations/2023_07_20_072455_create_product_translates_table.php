<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTranslatesTable extends Migration
{
    public function up()
    {
        Schema::create('product_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('language_code', 5);
            $table->string('name_product', 30);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('language_code')->references('language_code')->on('languages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_translates');
    }
};

