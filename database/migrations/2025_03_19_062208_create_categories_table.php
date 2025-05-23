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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); //id
            $table->string('category_name', 1000);
            $table->string('slug', 1000); //null cho phep
            $table->unsignedInteger('parent_id')->default(0); //kieeur int
            $table->unsignedInteger('sort_order')->nullable();
            $table->text('description')->nullable();
            $table->string('image', 1000)->nullable();
            $table->softDeletes('deleted_at');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(1);

            $table->timestamps(); //cr up
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
