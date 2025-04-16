<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $posts = [];
        for ($i = 1; $i <= 10; $i++) {
            $posts[] = [
                'topic_id' => rand(1, 5), // Giả định có 5 topic
                'title' => "Bài viết số $i",
                'slug' => "bai-viet-so-$i",
                'detail' => "Nội dung chi tiết của bài viết số $i.",
                'image' => "posts/post_$i.jpg",
                'type' => rand(0, 1) ? 'post' : 'page',
                'description' => "Mô tả ngắn về bài viết số $i.",
                'created_by' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
