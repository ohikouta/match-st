<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => 3,
                'content' => 'こんにちは！！',
                'individual_id' => 8,
            ],
            [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => 3,
                'content' => '作りたいゲームはありますか？',
                'individual_id' => 8,
            ],
            
        ]);
    }
}
