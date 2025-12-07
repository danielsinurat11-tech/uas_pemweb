<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Check if column doesn't exist before adding
            if (!Schema::hasColumn('products', 'category')) {
                // Check if category_id exists, if so add after it, otherwise after price
                if (Schema::hasColumn('products', 'category_id')) {
                    $table->string('category')->nullable()->after('category_id');
                } else {
                    $table->string('category')->nullable()->after('price');
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};

