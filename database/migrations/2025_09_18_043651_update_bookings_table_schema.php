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
        Schema::table('bookings', function (Blueprint $table) {
            // Drop existing columns that don't match the new schema
            $table->dropColumn([
                'package_type',
                'number_of_people', 
                'subtotal',
                'discount_percentage',
                'discount_amount',
                'total_price',
                'special_requests'
            ]);
            
            // Add new columns to match the required schema
            $table->integer('people')->after('travel_date');
            $table->decimal('price', 10, 2)->after('people');
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Restore the original columns
            $table->string('package_type')->after('destination_id');
            $table->integer('number_of_people')->after('package_type');
            $table->decimal('subtotal', 10, 2)->nullable()->after('number_of_people');
            $table->decimal('discount_percentage', 5, 2)->default(0)->after('subtotal');
            $table->decimal('discount_amount', 10, 2)->default(0)->after('discount_percentage');
            $table->decimal('total_price', 10, 2)->after('discount_amount');
            $table->text('special_requests')->nullable()->after('status');
            
            // Remove the new columns
            $table->dropColumn(['people', 'price']);
            
            // Change status back to string
            $table->string('status')->default('pending')->change();
        });
    }
};