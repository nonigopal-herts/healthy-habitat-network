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
        Schema::create('business_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Delete products if business (from user table) is deleted

            // Foreign key to product_services table
            $table->unsignedBigInteger('product_service_id');
            $table->foreign('product_service_id')
                ->references('id')
                ->on('product_services')
                ->onDelete('cascade'); // Delete relationship if product is deleted
            $table->timestamps();

            // Ensure each business can't have duplicate product entries
            //$table->unique(['business_id', 'product_service_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_products');
    }
};
