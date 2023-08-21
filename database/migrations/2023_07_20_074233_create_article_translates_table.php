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
        Schema::create('article_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_code', 5);
            $table->unsignedInteger('article_id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('slug', 100);
            
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('language_code')->references('language_code')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_translates');
    }
};
