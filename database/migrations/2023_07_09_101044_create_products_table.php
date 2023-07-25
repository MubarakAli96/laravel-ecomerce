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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('vendor_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->text('description');
            $table->text('short_decription');
            $table->string('product_thumbnail');
            $table->string('hot_deals')->nullable();
            $table->string('features')->nullable();
            $table->string('special_offers')->nullable();
            $table->string('special_deals')->nullable();
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
