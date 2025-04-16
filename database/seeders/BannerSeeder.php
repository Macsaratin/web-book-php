<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table("banners")->insert([
            [
                'name' => 'Khuyến mãi mùa hè',
                'link' => 'https://example.com/summer-sale',
                'image' => 'banners/summer-sale.jpg',
                'position' => 'slideshow',
                'description' => 'Giảm giá 50% cho các sản phẩm mùa hè!',
                'sort_order' => 1,
                'created_by' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ]);
    }
}
