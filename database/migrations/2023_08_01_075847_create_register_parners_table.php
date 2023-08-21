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
        Schema::create('register_partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 30);
            $table->string('distributor_phone', 20);
            $table->string('email_address', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('address_1', 255)->nullable();
            $table->text('address_2')->nullable();
            $table->string('language_code', 5)->nullable();
            $table->enum('form_type', ['distributors', 'retailers', 'installers'])->nullable();
            $table->text('city')->nullable();
            $table->text('district')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_partners');
    }
};
