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
            $table->foreign('branch_id')->references('id')->on('branches');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches');
        });
        Schema::table('service_promotions', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('service_id')->references('id')->on('services');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('service_promotions_id')->references('id')->on('service_promotions');
        });
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches');
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
