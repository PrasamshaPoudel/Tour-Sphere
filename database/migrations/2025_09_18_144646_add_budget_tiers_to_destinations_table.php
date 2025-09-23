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
        Schema::table('destinations', function (Blueprint $table) {
            $table->decimal('normal_price', 10, 2)->after('price')->nullable();
            $table->decimal('medium_price', 10, 2)->after('normal_price')->nullable();
            $table->decimal('five_star_price', 10, 2)->after('medium_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn(['normal_price', 'medium_price', 'five_star_price']);
        });
    }
};