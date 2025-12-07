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
        if (!Schema::hasTable('shippings')) {
            Schema::create('shippings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
                $table->string('tracking_number')->nullable();
                $table->string('courier')->nullable(); // JNE, J&T, Pos Indonesia, dll
                $table->enum('status', ['pending', 'packed', 'shipped', 'in_transit', 'delivered', 'failed'])->default('pending');
                $table->date('shipped_date')->nullable();
                $table->date('estimated_delivery_date')->nullable();
                $table->date('delivered_date')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
