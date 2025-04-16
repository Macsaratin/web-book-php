<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'name' => 'Trang Chủ',
                'link' => '/',
                'sort_order' => 1,
                'parent_id' => 0,
                'type' => 'page',
                'position' => 'header',
                'table_id' => null,
                'created_by' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sản Phẩm',
                'link' => '/san-pham',
                'sort_order' => 2,
                'parent_id' => 0,
                'type' => 'category',
                'position' => 'header',
                'table_id' => null,
                'created_by' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Liên Hệ',
                'link' => '/lien-he',
                'sort_order' => 3,
                'parent_id' => 0,
                'type' => 'page',
                'position' => 'footer',
                'table_id' => null,
                'created_by' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
