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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
        Schema::table('service_promotions', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('service_promotions_id')->references('id')->on('service_promotions')->onDelete('cascade');
        });
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('articles', function (Blueprint $table) {
            //
        });
        Schema::table('cities', function (Blueprint $table) {
            //
        });
        Schema::table('subdistricts', function (Blueprint $table) {
            //
        });
        Schema::table('villages', function (Blueprint $table) {
            //
        });

        Schema::table('branches', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
