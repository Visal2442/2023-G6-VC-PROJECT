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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->string('type');
<<<<<<< HEAD
            $table->float('latitude');
            $table->float('longitude');
            $table->boolean('available');
            // $table->unsignedBigInteger("district_id");
            $table->foreignId('district_id')->constrained(table:"districts")->onDelete("cascade")->onUpdate("cascade");
=======
            $table->string('image');
            $table->decimal('latitude', 18,9);
            $table->decimal('longitude', 18,9);
            $table->boolean('available')->default(true);
>>>>>>> main
            $table->foreignId('user_id')->constrained(table:"users")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
