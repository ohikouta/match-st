<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # future
        DB::table('events')->insert([
            'name' => '【初学者向け】HTMLとCSSを学ぶ会',
            'summary' => '初めてプログラミングを学ぶ方向けのイベントです。HTMLとCSSの基本を学びます。',
            'event_date' => '2024-08-23',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '東京都渋谷区神宮前1丁目19-1',
            'max_participants' => 100,
            'admin_id' => 1,
        ]);
        # future
        DB::table('events')->insert([
            'name' => '【中級者向け】JavaScriptを学ぶ会',
            'summary' => 'HTMLとCSSの基本を学んだ方向けのイベントです。JavaScriptの基本を学びます。',
            'event_date' => '2024-09-02',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '東京都港区六本木6丁目10-1',
            'max_participants' => 100,
            'admin_id' => 2,
        ]);
        # future
        DB::table('events')->insert([
            'name' => 'チーム開発イベント',
            'summary' => 'チームでの開発経験を積みたい方向けのイベントです。チームでの開発を体験します。',
            'event_date' => '2024-10-28',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '埼玉県さいたま市浦和区高砂1丁目16-12',
            'max_participants' => 20,
            'admin_id' => 3,
        ]);
        # past
        DB::table('events')->insert([
            'name' => 'IT就活相談会',
            'summary' => 'IT業界での就職活動について相談したい方向けのイベントです。',
            'event_date' => '2024-06-05',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '東京都千代田区丸の内1丁目9-1',
            'max_participants' => 60,
            'admin_id' => 4,
        ]);
        # past
        DB::table('events')->insert([
            'name' => 'お花見',
            'summary' => 'お花見を楽しむイベントです。お花見をしながら交流しましょう。',
            'event_date' => '2024-03-16',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '東京都新宿区西新宿2丁目8-1',
            'max_participants' => 35,
            'admin_id' => 5,
        ]);
        # past
        DB::table('events')->insert([
            'name' => 'ビーチバレー大会',
            'summary' => 'ビーチバレー大会を開催します。ビーチバレーを楽しみましょう。',
            'event_date' => '2024-07-28',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '埼玉県川越市大字川越106-1',
            'max_participants' => 30,
            'admin_id' => 1,
        ]);
        # future
        DB::table('events')->insert([
            'name' => 'クリスマスパーティー',
            'summary' => 'クリスマスパーティーを開催します。クリスマスを楽しみましょう。',
            'event_date' => '2024-12-24',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '神奈川県横浜市中区山下町2-2',
            'max_participants' => 40,
            'admin_id' => 2,
        ]);
        # future
        DB::table('events')->insert([
            'name' => '新年会',
            'summary' => '新年会を開催します。美味しいお餅が食べられます。',
            'event_date' => '2025-01-01',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '神奈川県鎌倉市長谷1丁目11-12',
            'max_participants' => 45,
            'admin_id' => 3,
        ]);
        # past
        DB::table('events')->insert([
            'name' => 'ChatGPT講座',
            'summary' => 'ChatGPTを使った会話を学ぶイベントです。ChatGPTを使ってみましょう。',
            'event_date' => '2024-04-12',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '千葉県千葉市中央区中央1丁目1-1',
            'max_participants' => 50,
            'admin_id' => 4,
        ]);
        # past
        DB::table('events')->insert([
            'name' => '節分イベント',
            'summary' => '節分を楽しむイベントです。豆まきをしましょう。',
            'event_date' => '2024-02-03',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'address' => '千葉県船橋市本町2丁目1-1',
            'max_participants' => 55,
            'admin_id' => 5,
        ]);
    }
}
