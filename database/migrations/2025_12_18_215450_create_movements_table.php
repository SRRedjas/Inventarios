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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->date('movement_date');
            $table->string('correlative', 50)->unique();
            $table->boolean('status');
            $table->string('comments');

            //foreigns
            $table->foreignId('user_id');
            $table->foreignId('store_id');
            $table->foreignId('movement_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
