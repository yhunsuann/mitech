<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('measurement_products', function (Blueprint $table) {
            $table->float('width');
            $table->float('height');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('measurement_products', function (Blueprint $table) {
            $table->dropColumn('width');
            $table->dropColumn('height');
        });
    }
};
