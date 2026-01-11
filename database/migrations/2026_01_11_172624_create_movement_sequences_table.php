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
        Schema::create('movement_sequences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movement_type_id')->constrained('movement_types');
            $table->foreignId('store_id')->constrained('stores');
            $table->unsignedInteger('year');
            $table->unsignedBigInteger('current_number')->default(0);
            $table->unique(['movement_type_id', 'store_id', 'year']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_sequences');
    }
};
