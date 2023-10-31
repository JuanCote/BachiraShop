<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->json('products'); // JSON field to store product information
            $table->timestamps();
            $table->decimal('total_price', 10, 2); // Field for total price
            $table->string('firstname');
            $table->string('surname');
            $table->string('street');
            $table->string('house');
            $table->string('postal_code');
            $table->string('city');
            $table->string('phone_number');

            // Foreign key constraint to link with users table
            $table->foreign('user_id')->references('id')->on('users');
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