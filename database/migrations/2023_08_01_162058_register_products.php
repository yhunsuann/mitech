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
        Schema::create('register_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('phone', 20);
            $table->string('email', 255)->nullable();
            $table->text('message')->nullable();
            $table->string('language_code', 5)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_products');
    }
};
