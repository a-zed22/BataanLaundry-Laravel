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
        Schema::create('product_warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // references products
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade'); // references warehouses
            $table->integer('quantity')->default(0); // Quantity of the product in the warehouse
            $table->enum('stock_status', ['available', 'low_stock', 'out_of_stock'])->default('available');
            $table->date('restock_date')->nullable(); // Nullable because restock date may not always be available
            $table->string('location')->nullable(); // Location of product in the warehouse (aisle, shelf, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_warehouses');
    }
};
