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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            //columsn 
            $table->string('type', 5);
            $table->boolean('status');
            $table->string('comments');

            //foreigns
            $table->foreignId('user_id');
            $table->unsignedBigInteger('from')->nullable();
            $table->unsignedBigInteger('to');
            $table->foreign('from')->references('id')->on('stores');
            $table->foreign('to')->references('id')->on('stores');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
