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
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['tcxcpt', 'tcxccc', 'tcddpt', 'tcddcc', 'tnpt', 'vc', 'vcc1', 'vcc2'])->default('tcxcpt');
            $table->double('amount', 8, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->double('amount', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
