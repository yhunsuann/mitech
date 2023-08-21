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
        Schema::rename('register_partners', 'form_distributors');
        Schema::rename('register_products', 'form_products');
        Schema::rename('replacements', 'form_replacements');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('form_distributors', 'register_partners');
        Schema::rename('form_products', 'register_products');
        Schema::rename('form_replacements', 'replacements');
    }
};
