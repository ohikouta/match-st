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
        // Cloudinaryから画像のURLを取得
        $filePath = public_path('storage/pic_fix/community_show.jpg');
        $cloudinaryResponse = Cloudinary::upload($filePath);
        $imageUrl = $cloudinaryResponse->secure_url;
        
        // 1枚入るか検証
        DB::table('images')->insert([
            [
                'url' => $imageUrl,
                'alt_text' => '',
                'caption' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
