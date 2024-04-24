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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique;
            $table->string('phone_number')->unique;
            $table->string('password');
            $table->string('photo')->nullable();
            $table->decimal('total_earning', 10, 2)->default(0);
            $table->string('like_count_youtube')->default(0);
            $table->string('like_count_facebook')->default(0);
            $table->foreignId('invited_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->rememberToken();
            $table->timestamps(); 
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};