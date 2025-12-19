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
            $table->timestamps();
            
            //columns
            $table->string('code');
            $table->string('description');
            $table->string('img');
            $table->boolean('status');

            //foreigns
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('uom_id');


            //conect foreigns
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('uom_id')->references('id')->on('uoms');

            
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
