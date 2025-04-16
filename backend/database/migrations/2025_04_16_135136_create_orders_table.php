<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name')->nullable();
            $table->bigInteger('order_number')->nullable();
            $table->unsignedBigInteger('app_id')->nullable();
            $table->unsignedBigInteger('checkout_id')->nullable();
            $table->string('confirmation_number')->nullable();
            $table->string('order_status_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
