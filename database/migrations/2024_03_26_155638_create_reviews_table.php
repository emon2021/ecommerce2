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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->text('comment')->nullable();
            $table->integer('rating')->nullable();
            $table->string('author')->nullable();
            $table->string('email')->nullable();
            $table->string('review_date')->nullable();
            $table->string('review_month')->nullable();
            $table->string('review_year')->nullable();
            $table->foreign( 'user_id' )->on('users')->references('id')
                ->onDelete( 'cascade' );
            $table->foreign( 'product_id' )->on('products')->references('id')
                ->onDelete( 'cascade' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
