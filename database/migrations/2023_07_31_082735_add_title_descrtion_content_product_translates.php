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
        Schema::table('product_translates', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_translates', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('content');
        });
    }
};
