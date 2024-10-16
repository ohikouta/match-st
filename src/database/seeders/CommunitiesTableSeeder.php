<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Community;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データの挿入
        Community::create([
            'category' => 'qualification',
            'explanation' => '取りたい資格を見つけ、仲間を集める',
        ]);
        
        Community::create([
            'category' => 'topic',
            'explanation' => 'テーマを決めて、知識を共有する',
        ]);
        
        Community::create([
            'category' => 'product',
            'explanation' => '作ったアプリを公開しよう'
        ]);
        
    }
}
