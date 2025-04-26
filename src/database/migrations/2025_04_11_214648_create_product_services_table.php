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
        Schema::create('product_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image')->nullable();

            //Add product_services_type_id as foreign key from product_services_types table
//            $table->foreignId('product_service_types_id')
//                ->constrained('product_service_types')
//                ->name('fk_prodserv_type');

            //Add product_services_category_id as foreign key from product_services_categories table
//            $table->foreignId('product_service_category_id')
//                ->constrained('product_service_categories')
//                ->name('fk_prodserv_cat');

            //Add product_services_subcategory_id as foreign key from product_services_subcategories table
            $table->foreignId('product_service_subcategory_id')
                ->constrained('product_service_subcategories')
                ->name('fk_prodserv_subcat');
                //->onDelete('');

            //Add price_tag_id as foreign key from price_tags table
            $table->foreignId('price_tag_id')
                ->constrained('price_tags');
                //->onDelete('set null');

            $table->decimal('price', 10, 2);
            $table->string('size')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('health_benefits')->nullable(); // Changed to text
            $table->text('certificates')->nullable(); // Changed to text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_services');
    }
};
