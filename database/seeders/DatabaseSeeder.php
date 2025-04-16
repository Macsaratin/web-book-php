<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chạy các seeder để tạo dữ liệu mẫu
        $this->call([
            BannerSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            MenuSeeder::class,
            PostSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
        ]);
    }
}
