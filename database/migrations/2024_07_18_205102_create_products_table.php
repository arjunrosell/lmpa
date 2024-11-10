<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id')->constrained('categories')->cascadeOnDelete();
            $table->uuid('supplier_id')->constrained('suppliers')->cascadeOnDelete();
            $table->uuid('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->string('name');
            $table->string('sku')->unique();
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
