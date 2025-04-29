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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the warehouse
            $table->string('location'); // Location or address of the warehouse
            $table->integer('capacity')->nullable(); // Optional: capacity in terms of square footage or units
            $table->string('contact_number')->nullable(); // Optional: contact number
            $table->enum('status', ['active', 'inactive'])->default('active'); // Warehouse status
            $table->unsignedBigInteger('updated_by')->nullable(); // Track the admin who updated
            $table->foreign('updated_by')->references('id')->on('admins'); // Assuming you have an admins table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
