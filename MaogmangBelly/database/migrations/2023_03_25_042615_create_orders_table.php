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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->double("grand_total", 16, 2)->default(0);
            $table->char("order_type");
            $table->string("address")->nullable();
            $table->boolean("is_purchased")->default(false);
            $table->timestamp("date_purchased")->nullable();
            $table->timestamp("date_completed")->nullable();
            $table->bigInteger("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
