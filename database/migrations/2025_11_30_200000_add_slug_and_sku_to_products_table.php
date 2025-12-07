<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'slug')) {
                    $table->string('slug')->unique()->nullable()->after('name');
                }
                if (!Schema::hasColumn('products', 'sku')) {
                    $table->string('sku')->unique()->nullable()->after('slug');
                }
                if (!Schema::hasColumn('products', 'discount_price')) {
                    $table->decimal('discount_price', 10, 2)->nullable()->after('price');
                }
                if (!Schema::hasColumn('products', 'category_id')) {
                    $table->unsignedBigInteger('category_id')->nullable()->after('category');
                }
            });
            
            // Generate slug untuk produk yang sudah ada tapi belum punya slug
            try {
                $products = \App\Models\Product::whereNull('slug')->orWhere('slug', '')->get();
                foreach ($products as $product) {
                    $slug = \Illuminate\Support\Str::slug($product->name);
                    $originalSlug = $slug;
                    $counter = 1;
                    while (\App\Models\Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                        $slug = $originalSlug . '-' . $counter;
                        $counter++;
                    }
                    $product->slug = $slug;
                    $product->save();
                }
            } catch (\Exception $e) {
                // Skip jika ada error
            }
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('products', 'sku')) {
                $table->dropColumn('sku');
            }
            if (Schema::hasColumn('products', 'discount_price')) {
                $table->dropColumn('discount_price');
            }
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropColumn('category_id');
            }
        });
    }
};

