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
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('username');
                $table->string('phone_number')->nullable();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password')->nullable();
                $table->string('verification_code')->nullable();
                $table->string('image')->default('https://o.remove.bg/downloads/dd420322-5eda-4f60-b39c-ce113599601e/hd-profile-user-round-green-icon-symbol-transparent-png-11639594320ayr6vyoidq-removebg-preview.png');
                $table->string('role')->default('customer');
                $table->rememberToken();
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
