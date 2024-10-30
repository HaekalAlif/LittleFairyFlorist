<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 255);
            $table->string('customer_phone', 15);
            $table->text('address');
            $table->string('image_reference', 255)->nullable();
            $table->text('additional_notes')->nullable();
            $table->integer('quantity');
            $table->date('delivery_date');
            $table->enum('pickup_option', ['delivery', 'pickup']);
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
