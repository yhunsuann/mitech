<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementProductsTable extends Migration
{
    public function up()
    {
        Schema::create('measurement_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->decimal('thickness', 10, 2);
            $table->string('thickness_unit')->default('mm');
            $table->decimal('price', 10, 2);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('measurement_products');
    }
};
