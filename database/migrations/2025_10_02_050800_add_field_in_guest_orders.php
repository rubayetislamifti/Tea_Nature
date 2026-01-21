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
        Schema::table('guest_orders', function (Blueprint $table) {
            $table->integer('quantity')->after('amount');
            $table->string('payment_method');
            $table->string('sender_number')->after('payment_method');
            $table->string('status')->after('quantity');
            $table->string('transaction_id')->after('payment_method');
            $table->string('invoice_id');
            $table->unsignedBigInteger('product_id')->after('id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_orders', function (Blueprint $table) {
            //
        });
    }
};
