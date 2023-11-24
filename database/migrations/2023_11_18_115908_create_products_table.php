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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('in_stock');
            $table->string('description');
            $table->integer('price');
            $table->jsonb('characteristics');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');
            $table->foreignId('brand_id')
                ->constrained('brands')
                ->onDelete('cascade');
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