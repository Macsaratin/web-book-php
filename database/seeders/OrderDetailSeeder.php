<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_details')->insert([
            [
                'order_id' => 1, // Giả sử đơn hàng có ID = 1
                'product_id' => 1, // Giả sử sản phẩm có ID = 1
                'qty' => 2,
                'price' => 50000, // Giá sản phẩm 50,000 VND
                'amount' => 100000, // Tổng tiền (2 x 50,000)
                'discount' => 0, // Không có giảm giá
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'qty' => 1,
                'price' => 100000,
                'amount' => 100000,
                'discount' => 5000, // Giảm giá 5,000 VND
            ]
        ]);
    }
}
