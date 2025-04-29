<?php

use App\Models\Customer;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'paid', 'shipped', 'delivered', 'canceled'])->default('pending');
            $table->integer('total_quantity');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('discount', 15, 2)->default(0)->nullable();
            $table->decimal('shipping_fee', 15, 2)->default(0);
            $table->decimal('grand_total', 15, 2);
            $table->text('notes')->nullable();

            // New fields
            $table->unsignedBigInteger('updated_by')->nullable(); // Track the admin who updated
            $table->foreign('updated_by')->references('id')->on('admins'); // Assuming you have an admins table
            $table->timestamp('order_date')->nullable(); // Nullable if you want to track when the order was placed
            $table->enum('payment_method', ['credit_card', 'paypal', 'bank_transfer', 'cash_on_delivery'])->default('credit_card');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->enum('delivery_method', ['standard_shipping', 'express_shipping', 'pickup_in_store'])->default('standard_shipping');
            $table->text('delivery_address'); // You can also store this as a JSON field if you'd prefer to separate street, city, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
