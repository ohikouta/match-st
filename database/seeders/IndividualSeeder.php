<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndividualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 基本情報技術者
        DB::table('individuals')->insert([
            'title' => '基本情報技術者',
            'summary' => 'IT技術の基礎を学びましょう',
            'category' => 'qualification',
            'admin_id' => 1,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1699094123/c7jc6ml6ev7osx7bhwxn.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 応用情報技術者
        DB::table('individuals')->insert([
            'title' => '応用情報技術者',
            'summary' => 'IT技術の応用を学びましょう',
            'category' => 'qualification',
            'admin_id' => 2,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1698562406/c7nmro8i5myk6ua3cw6m.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // G検定
        DB::table('individuals')->insert([
            'title' => 'G検定',
            'summary' => 'ディープラーニングを学ぼう',
            'category' => 'qualification',
            'admin_id' => 3,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1699085170/ewqzi23svkpdzgp7xcg4.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ITパスポート
        DB::table('individuals')->insert([
            'title' => 'ITパスポート',
            'summary' => 'ITの勉強をしよう',
            'category' => 'qualification',
            'admin_id' => 4,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1698037465/vqd8mzeo2dc9vfiru5gt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // CCNA
        DB::table('individuals')->insert([
            'title' => 'CCNA',
            'summary' => 'ネットワークを学ぼう',
            'category' => 'qualification',
            'admin_id' => 5,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1698037807/mst269aplhazaoepusov.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // タスク管理アプリ
        DB::table('individuals')->insert([
            'title' => 'タスク管理アプリ',
            'summary' => 'Laravelで作るタスク管理アプリ',
            'category' => 'product',
            'admin_id' => 1,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1699085076/bpq7qjlzb8oaygb21hbb.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // マッチングアプリ
        DB::table('individuals')->insert([
            'title' => 'マッチングアプリ',
            'summary' => 'マッチングアプリ作りたい人集まれ',
            'category' => 'product',
            'admin_id' => 2,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1699093740/tlnjt5ow6ewwacj3fpfk.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ゲーム
        DB::table('individuals')->insert([
            'title' => 'ゲーム',
            'summary' => '面白いゲームを作りましょう',
            'category' => 'product',
            'admin_id' => 3,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1699082077/ajfcmuccygktsmzovdbh.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 動画配信アプリ
        DB::table('individuals')->insert([
            'title' => '動画配信アプリ',
            'summary' => '動画配信アプリを作りましょう',
            'category' => 'product',
            'admin_id' => 4,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1699085245/vwzchjay2ehchx8lx7o4.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Git
        DB::table('individuals')->insert([
            'title' => 'Git',
            'summary' => 'Gitの仕組みを理解するんだ！',
            'category' => 'topic',
            'admin_id' => 5,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1699085118/mkdxawwrec3rzob8kth3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Python
        DB::table('individuals')->insert([
            'title' => 'Python',
            'summary' => 'Pythonやりたい人集合',
            'category' => 'topic',
            'admin_id' => 1,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697802920/b0szbjwoihtqimngppwg.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ディープラーニング
        DB::table('individuals')->insert([
            'title' => 'ディープラーニング',
            'summary' => '最先端の技術に挑戦しよう',
            'category' => 'topic',
            'admin_id' => 2,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1697803115/zhbsjgolqggohuqlgijg.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Office
        DB::table('individuals')->insert([
            'title' => 'Office',
            'summary' => 'Office製品を使いこなそう',
            'category' => 'topic',
            'admin_id' => 3,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1696794254/wops9yokzj15z82pyzyw.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Docker
        DB::table('individuals')->insert([
            'title' => 'Docker',
            'summary' => '仮想環境を作る',
            'category' => 'topic',
            'admin_id' => 4,
            'image' => 'https://res.cloudinary.com/dqujklh6e/image/upload/v1696842041/jb8jhirh5esxexpsjhj2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
