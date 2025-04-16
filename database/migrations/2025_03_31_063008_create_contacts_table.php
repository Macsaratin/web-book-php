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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // Foreign key for user_id (if it references the users table)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('title');
            $table->mediumText('content');
            
            // Foreign key for reply_id (if it references the contacts table itself)
            $table->unsignedBigInteger('reply_id')->nullable()->default(0);            
            // Soft deletes for "deleted_at"
            $table->softDeletes();

            $table->unsignedInteger('update_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
