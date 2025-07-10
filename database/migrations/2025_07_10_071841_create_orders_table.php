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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('grand_total', 10, 2);
            $table->string('payment_method')->nullable();
            $table->string('payment_status');
            $table->enum('status', ['new','pending', 'delivered', 'shiped', 'cancelled'])->default('pending');
            $table->string('currency')->default('INR');
            $table->decimal('shipping_amount', 10, 2)->default(0.00);
            $table->string('shipping_method')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('notes')->nullable();
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
