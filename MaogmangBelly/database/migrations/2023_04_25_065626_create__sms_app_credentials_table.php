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
        Schema::create('sms_app_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('SHORTCODE_GLOBE');
            $table->string('SHORTCODE_CROSS');
            $table->string('APP_ID');
            $table->string('APP_SECRET');
            $table->string('API_TYPE');
            $table->string('APP_NAME');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_app_credentials');
    }
};
