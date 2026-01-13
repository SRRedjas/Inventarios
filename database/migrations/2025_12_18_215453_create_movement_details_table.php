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
        Schema::create('movement_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            //columsn 
            $table->decimal('amount', 10,4);
            $table->decimal('movement_amount', 10,4);
            $table->decimal('cost', 10,4);


            //foreigns
            $table->foreignId('movement_id');
            $table->foreignId('product_id');
            $table->foreignId('oum_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_details');
    }
};
