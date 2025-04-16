<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // User's name
            $table->string('email')->unique(); // Unique email address
            $table->string('password'); // Password field
            $table->timestamps(); // `created_at` and `updated_at` timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('users'); // Drops the users table if rolled back
    }
}
