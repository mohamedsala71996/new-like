<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable()->default('123 Main Street');
            $table->string('email')->nullable()->default('info@example.com');
            $table->string('phone')->nullable()->default('1234567890');
            $table->string('facebook')->nullable()->default('https://facebook.com/example');
            $table->string('youtube')->nullable()->default('https://youtube.com/example');
            $table->string('telegram')->nullable()->default('https://t.me/example');
            $table->text('about_us')->nullable()->default('نبذة عن الموقع');
            $table->string('deposit_phone')->nullable()->default('0987654321');
            $table->string('subscription_fee')->nullable()->default('2000');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
