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
        Schema::create('slider_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('slider_id');
            $table->string('language_code', 5);
            $table->string('link')->nullable();
            $table->string('file')->nullable();
            $table->string('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_translates');
    }
};
