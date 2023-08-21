<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstantTranslatesTable extends Migration
{
    public function up()
    {
        Schema::create('constant_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('constant_id');
            $table->string('name', 30);
            $table->text('value')->nullable();
            $table->string('language_code', 5);

            $table->foreign('constant_id')->references('id')->on('constants')->onDelete('cascade');
            $table->foreign('language_code')->references('language_code')->on('languages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('constant_translates');
    }
};

