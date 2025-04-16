<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1, 
                'brand_id' => 1,
                'name' => 'iPhone 10 Pro Max',
                'slug' => 'iphone-10-pro-max',
                'image' => 'products/iphone-14-pro-max.jpg',
                'qty' => 100,
                'description' => 'Điện thoại cao cấp của Apple với màn hình 120Hz.',
                'price' => 29990000,
                'is_on_sale' => true,
                'pricesale' => 27990000,
                'created_by' => 1,
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
