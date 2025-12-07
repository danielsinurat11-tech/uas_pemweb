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
        // Just make customer_id nullable to avoid foreign key issues
        // We'll handle customer creation in application logic
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'customer_id')) {
                // Try to drop foreign key if exists
                try {
                    $table->dropForeign(['customer_id']);
                } catch (\Exception $e) {
                    // Foreign key might not exist, continue
                }
                $table->unsignedBigInteger('customer_id')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'customer_id')) {
                $table->unsignedBigInteger('customer_id')->nullable(false)->change();
            }
        });
    }
};
