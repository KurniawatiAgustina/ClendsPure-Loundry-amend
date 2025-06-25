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
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('branch_id');
            $table->integer('total_price');
            $table->enum('status', ['New', 'Processing', 'Delivered', 'Cancelled'])->default('New');
            $table->enum('category', ['AntarJemput', 'AntarSaja', 'JemputSaja', 'Mandiri']);
            $table->enum('payment_method', ['Cash', 'Transfer']);
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('note')->nullable();
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
