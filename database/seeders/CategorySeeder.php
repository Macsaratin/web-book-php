<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Điện thoại',
                'slug' => 'dien-thoai',
                'parent_id' => 0,
                'sort_order' => 1,
                'description' => 'Danh mục các sản phẩm điện thoại',
                'image' => 'categories/dien-thoai.jpg',
                'created_by' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
