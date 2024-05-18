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
            $table->string('name_ar');
            $table->string('name_en');
            $table->decimal('price',8,2)->nullable();
            $table->integer('qty');
            $table->string('img');
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->integer('viewer')->default(0);
            $table->longText('desc_ar');
            $table->longText('desc_en');
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
