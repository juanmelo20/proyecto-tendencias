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
        Schema::create('ordersdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')->on('products');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
            ->references('id')->on('orders');

            $table->integer('quantity');
            $table->string('registeredby');
            $table->decimal('subtotal');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordersdetails');

    }
};
