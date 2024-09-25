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
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->string('reciver_name');
            $table->string('reciver_city');
            $table->string('reciver_phone_number');
            $table->string('reciver_address');
            $table->enum('order_status',['pending','canceled','delivered','shipping','preparing']);
            $table->string('reciver_town');
            $table->unsignedInteger('total_price');
            $table->foreignId('cobon_id')->nullable()->references('id')->on('cobons');
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
