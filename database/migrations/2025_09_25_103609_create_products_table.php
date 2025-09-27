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
            $table->string('code_product');
            $table->string('name_product');
            $table->tinyText('image_product');
            $table->enum('category', ['reguler','exotic', 'deluxe', 'esspreso']);
            $table->enum('activate', ['activate','inactivate'])->default('activate');
            $table->integer('price');
            $table->integer('stok');
            $table->string('notes');
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
