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
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
                $table->string('payment_method'); // 'bank_transfer', 'simulation', 'manual'
                $table->enum('status', ['pending', 'processing', 'paid', 'failed', 'expired', 'cancelled'])->default('pending');
                $table->decimal('amount', 10, 2);
                $table->string('payment_proof')->nullable(); // Path to uploaded proof image
                $table->string('bank_name')->nullable(); // Bank name for transfer
                $table->string('account_number')->nullable(); // Account number
                $table->string('account_name')->nullable(); // Account holder name
                $table->string('transaction_id')->nullable(); // For simulation payment
                $table->text('notes')->nullable();
                $table->timestamp('paid_at')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
