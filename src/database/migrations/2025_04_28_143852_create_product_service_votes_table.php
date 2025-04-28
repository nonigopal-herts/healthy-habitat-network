<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_service_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_service_id')->constrained('product_services')->onDelete('cascade');
            $table->foreignId('business_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('yes_vote')->default(0);
            $table->integer('no_vote')->default(0);
            $table->timestamps();

            // Use a shorter name for the unique constraint
            $table->unique(
                ['product_service_id', 'business_id', 'user_id'],
                'ps_votes_unique'  // Custom shorter name
            );
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_service_votes');
    }
};
