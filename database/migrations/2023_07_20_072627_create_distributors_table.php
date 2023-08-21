<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorsTable extends Migration
{
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->string('location',200)->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->string('region',100)->nullable();
            $table->string('latitude',30);
            $table->string('longitude',30);
            $table->string('category', 50);
            $table->string('phone_number', 20);
            $table->string('website', 50);
            $table->string('email', 50);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distributors');
    }
};
