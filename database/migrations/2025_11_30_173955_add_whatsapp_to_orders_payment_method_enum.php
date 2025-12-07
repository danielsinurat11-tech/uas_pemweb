<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add payment_method column if it doesn't exist
        if (!Schema::hasColumn('orders', 'payment_method')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->enum('payment_method', ['cash', 'transfer', 'cod', 'credit_card', 'whatsapp'])->default('whatsapp')->after('status');
            });
        } else {
            // Modify the payment_method enum to include 'whatsapp' and set default to 'whatsapp'
            DB::statement("ALTER TABLE orders MODIFY COLUMN payment_method ENUM('cash', 'transfer', 'cod', 'credit_card', 'whatsapp') NOT NULL DEFAULT 'whatsapp'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove 'whatsapp' from enum (set existing whatsapp records to 'transfer')
        DB::statement("UPDATE orders SET payment_method = 'transfer' WHERE payment_method = 'whatsapp'");
        DB::statement("ALTER TABLE orders MODIFY COLUMN payment_method ENUM('cash', 'transfer', 'cod', 'credit_card') NOT NULL DEFAULT 'cash'");
    }
};
