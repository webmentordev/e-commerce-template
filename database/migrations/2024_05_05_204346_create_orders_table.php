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
            $table->string('name');
            $table->string('email');
            $table->string('transit_id')->nullable(); // Tracking ID for logistics
            $table->string('logistics')->nullable();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->bigInteger('quantity');
            $table->decimal('price', 10, 2);
            $table->boolean('is_paid')->default(false);
            $table->string('payment')->default('pending');
            $table->string('shipping')->default('pending');
            $table->text('order_id');
            $table->text('url')->nullable();
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
