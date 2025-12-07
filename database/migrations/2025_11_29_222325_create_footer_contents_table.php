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
        Schema::create('footer_contents', function (Blueprint $table) {
            $table->id();
            $table->string('column'); // column_1, column_2, column_3, column_4
            $table->string('type'); // title, description, list_item, social_link
            $table->string('title')->nullable(); // For column title
            $table->text('content')->nullable(); // For description or link text
            $table->string('url')->nullable(); // For links
            $table->string('icon')->nullable(); // For social icons (facebook, instagram, whatsapp, email)
            $table->integer('order')->default(0); // For ordering items
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_contents');
    }
};
