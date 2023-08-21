<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_code', 5);
            $table->unsignedInteger('menu_id');
            $table->string('menu_name', 30);
            $table->string('slug', 100);
            
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('language_code')->references('language_code')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_translates');
    }
};
