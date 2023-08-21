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
        Schema::create('library_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('library_id');
            $table->string('language_code', 5);
            $table->string('name', 30);
            $table->string('slug', 100);
            
            $table->foreign('library_id')->references('id')->on('librarys');
            $table->foreign('language_code')->references('language_code')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_translates');
    }
};
