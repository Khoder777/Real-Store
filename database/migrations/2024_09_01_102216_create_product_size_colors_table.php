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
        Schema::create('product_size_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productsize_id')->references('id')->on('product_sizes');
            $table->foreignId('color_id')->references('id')->on('colors');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->decimal('price', 10, 2);
            $table->decimal('offer',10,2)->default(0);
            $table->unsignedInteger('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_size_colors');
    }
};
