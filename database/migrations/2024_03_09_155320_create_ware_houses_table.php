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
        Schema::create('ware_houses', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_name');
            $table->string('warehouse_address');
            $table->integer('warehouse_phone');
            $table->string('warehouse_slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ware_houses');
    }
};
