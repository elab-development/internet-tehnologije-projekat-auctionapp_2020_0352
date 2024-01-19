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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user');
            $table->string('product_name');
            $table->foreignId('category_id');
            $table->string('description');
            $table->decimal('start_price', 10, 2)->nullable();
            $table->decimal('current_price', 10, 2)->nullable();
            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
