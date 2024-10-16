<?php

namespace Database\Seeders;
# 怖いから残してるけど多分いらないコメントアウト
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 他のシーダークラスを呼び出してデータを挿入する
        $this->call([
            UserSeeder::class,
            ImageSeeder::class,
            IndividualSeeder::class,
            EventSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
