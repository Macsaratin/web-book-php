<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('email');
            $table->string('phone')->nullable()->after('username');
            $table->string('address')->nullable()->after('phone');
            $table->date('birthday')->nullable()->after('address');
            $table->tinyInteger('gender')->default(1)->after('birthday');
            $table->string('image')->nullable()->after('gender');
            $table->enum('role', ['admin', 'user'])->default('user')->after('image');
            $table->tinyInteger('status')->default(1)->after('role');
        });
    }
    
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'phone', 'address', 'birthday', 'gender', 'image', 'role','status']);
        });
    }
    
};
