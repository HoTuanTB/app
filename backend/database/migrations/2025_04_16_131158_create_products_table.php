<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('shopify_product_id')->unique();
            $table->string('title');
            $table->text('body_html')->nullable();
            $table->string('product_type')->nullable();
            $table->string('handle')->nullable();
            $table->string('tags')->nullable();
            $table->string('status')->nullable();
            $table->string('admin_graphql_api_id')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

