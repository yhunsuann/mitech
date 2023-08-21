<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstantsTable extends Migration
{
    public function up()
    {
        Schema::create('constants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 30);
            $table->enum('type', ['image', 'text', 'textArea', 'textEditor'])->default('text');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('constants');
    }
};

