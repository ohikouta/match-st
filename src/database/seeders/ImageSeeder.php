<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cloudinary;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Cloudinaryから画像のURLを取得
        // $filePath = public_path('storage/pic_fix/community_show.jpg');
        // $cloudinaryResponse = Cloudinary::upload($filePath);
        // $imageUrl = $cloudinaryResponse->secure_url;

        // アプリの固定画像を入れ込む
        // 画像の説明はcaptionカラムにて追加し，Controller側ではここでフィルタリングする
        
        // ホーム画面: コミュニティタイトルの背景画像及びコミュニティ作成画面のヘッダー画像
        DB::table('images')->insert([
            [
                'url' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697882289/zgoamtkyq4v4jutafqbg.jpg',
                'alt_text' => '',
                'caption' => 'individual-pic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);

        // ホーム画面: イベントタイトルの背景画像及びイベント作成画面のヘッダー画像
        DB::table('images')->insert([
            [
                'url' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697882484/n8jcyqtmbq6u2ijesowa.jpg',
                'alt_text' => '',
                'caption' => 'event-pic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
        DB::table('images')->insert([
            [
                'url' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697882289/zgoamtkyq4v4jutafqbg.jpg',
                'alt_text' => '',
                'caption' => 'home-community-title-background',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
        DB::table('images')->insert([
            [
                'url' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697882289/zgoamtkyq4v4jutafqbg.jpg',
                'alt_text' => '',
                'caption' => 'home-community-title-background',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
        DB::table('images')->insert([
            [
                'url' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697882289/zgoamtkyq4v4jutafqbg.jpg',
                'alt_text' => '',
                'caption' => 'home-community-title-background',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}


