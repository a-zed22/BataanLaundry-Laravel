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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_number')->unique();
            $table->string('product_brand')->nullable();
            $table->decimal('product_price', 15, 2);
            $table->text('product_description')->nullable();
            $table->string('product_sku')->unique();
            $table->integer('stock_quantity')->default(0); // Default to 0 if no stock is available
            $table->enum('availability', ['in_stock', 'out_of_stock', 'backorder', 'preorder'])->default('in_stock');
            $table->enum('product_status', ['active', 'discontinued', 'pending'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
