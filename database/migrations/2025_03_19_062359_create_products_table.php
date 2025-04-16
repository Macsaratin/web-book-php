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
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id')->default(0);
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique();
            $table->string('image')->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->string('description')->nullable();
            $table->float('price');
            $table->integer('discount');
            $table->boolean('is_on_sale')->default(false);
            $table->float('pricesale')->default(0);
            $table->softDeletes('deleted_at');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
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
