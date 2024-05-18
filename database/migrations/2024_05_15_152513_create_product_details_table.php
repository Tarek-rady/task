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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->string('color_ar')->nullable();
            $table->string('color_en')->nullable();
            $table->string('code_color')->nullable();
            $table->string('size_ar')->nullable();
            $table->string('size_en')->nullable();
            $table->string('code_size')->nullable();
            $table->string('img')->nullable();
            $table->enum('type' , ['img' , 'color' , 'size']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
