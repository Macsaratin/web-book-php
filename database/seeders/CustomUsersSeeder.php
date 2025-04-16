<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('custom_users')->insert([
            [
                'fullname' => 'Admin User',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'phone' => '1234567890',
                'address' => '123 Admin Street',
                'birthday' => '1990-01-01',
                'gender' => 'male',
                'avatar' => 'avatars/admin.jpg',
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
