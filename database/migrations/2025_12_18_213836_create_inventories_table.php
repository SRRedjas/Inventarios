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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            //columsn

            $table->decimal('unitary_cost' ,10,4);
            $table->decimal('current_stock' ,10,4);
            $table->string('valuation');

            //foreigns 
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('store_id');

            //relate foreigns
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('store_id')->references('id')->on('stores');

            
        });
    }

    /**
     * Reverse the migrations. 
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
