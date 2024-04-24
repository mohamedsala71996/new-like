<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('photo');
            $table->unsignedBigInteger('customer_id');
            $table->enum('status', ['pending', 'active', 'cancelled'])->default('pending');
            $table->enum('method', ['vcash', 'ipa']);
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->dateTime('Subscription_End_Date')->default(DB::raw('DATE_ADD(created_at, INTERVAL 1 YEAR)'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
