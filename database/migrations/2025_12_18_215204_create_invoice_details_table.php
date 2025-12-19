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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            //columns
            $table->integer('line');
            $table->decimal('price', 10,4);
            $table->decimal('amount', 10,4);
            $table->decimal('subtotal', 10,4);


            //foreign

            $table->foreignId('user_id');
            $table->foreignId('customer_id');
            $table->foreignId('payment_id');


            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
