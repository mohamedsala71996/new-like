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
        Schema::table('addlinks', function (Blueprint $table) {
            $table->string('color')->default('#FF0000');
            $table->integer('second')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addlinks', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->dropColumn('second');

        });
    }
};
