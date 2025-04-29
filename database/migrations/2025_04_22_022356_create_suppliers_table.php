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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('contact_person')->nullable();
            $table->string('supplier_number')->nullable();
            $table->string('supplier_email')->nullable();
            $table->text('supplier_address')->nullable();
            $table->string('tax_id')->nullable();
            $table->enum('supplier_status', ['active', 'inactive'])->default('active');
            $table->string('supplier_logo')->nullable(); // store image path (not the actual file)
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
};
