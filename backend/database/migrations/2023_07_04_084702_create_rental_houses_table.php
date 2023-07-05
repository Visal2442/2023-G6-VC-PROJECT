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
        Schema::create('rental_houses', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->integer('number_of_room');
            $table->integer('number_of_floor');
            $table->integer('number_of_bathroom');
            $table->integer('number_of_kitchen');
            $table->boolean('available');
            $table->foreignId('property_id')->constrained(table:'properties')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retal_houses');
    }
};
