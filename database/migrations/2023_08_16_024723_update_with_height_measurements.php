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
        Schema::table('measurement_products', function (Blueprint $table) {
            $table->decimal('thickness', 10, 3)->nullable()->change();
            $table->decimal('width', 10, 2)->nullable()->change();
            $table->decimal('height', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('measurement_products', function (Blueprint $table) {
            $table->decimal('thickness', 10, 3)->change();
            $table->decimal('width', 10, 2)->change();
            $table->decimal('height', 10, 2)->change();
        });
    }
};
