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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->integer('childcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('code');
            $table->string('unit')->nullable();
            $table->string('tags')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->string('stock_quantity')->nullable();
            $table->integer('warehouse')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('images')->nullable();
            $table->string('video')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('today_deal')->nullable();
            $table->integer('flash_deal_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('cash_on_delivery')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('admin_id')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->timestamps();
            $table->integer('pickup_point_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete( 'cascade' );
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
