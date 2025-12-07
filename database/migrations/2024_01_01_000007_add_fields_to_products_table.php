<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add image column if it doesn't exist
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable()->after('price');
            }
            if (!Schema::hasColumn('products', 'image_2')) {
                // If image column exists, add after it, otherwise add after price
                if (Schema::hasColumn('products', 'image')) {
                    $table->string('image_2')->nullable()->after('image');
                } else {
                    $table->string('image_2')->nullable()->after('price');
                }
            }
            if (!Schema::hasColumn('products', 'image_3')) {
                if (Schema::hasColumn('products', 'image_2')) {
                    $table->string('image_3')->nullable()->after('image_2');
                } else if (Schema::hasColumn('products', 'image')) {
                    $table->string('image_3')->nullable()->after('image');
                } else {
                    $table->string('image_3')->nullable()->after('price');
                }
            }
            if (!Schema::hasColumn('products', 'material_description')) {
                $table->text('material_description')->nullable()->after('description');
            }
            if (!Schema::hasColumn('products', 'color')) {
                if (Schema::hasColumn('products', 'material_description')) {
                    $table->string('color')->nullable()->after('material_description');
                } else {
                    $table->string('color')->nullable()->after('description');
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['image_2', 'image_3', 'material_description', 'color']);
        });
    }
};

