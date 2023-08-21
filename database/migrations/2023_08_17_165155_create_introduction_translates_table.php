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
        Schema::create('introduction_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('introduction_id');
            $table->string('language_code', 5);
            $table->string('mitect_title')->nullable();
            $table->text('mitect_content')->nullable();
            $table->string('mitect_file')->nullable();
            $table->string('vgsi_title')->nullable();
            $table->string('vgsi_file')->nullable();
            $table->string('about_file')->nullable();
            $table->string('content_about_1')->nullable();
            $table->string('content_about_2')->nullable();
            $table->string('content_about_3')->nullable();
            $table->string('vision_title')->nullable();
            $table->string('vision_content')->nullable();
            $table->string('vision_file')->nullable();
            $table->string('mission_title')->nullable();
            $table->string('mission_content')->nullable();
            $table->string('mission_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('introduction_translates');
    }
};
