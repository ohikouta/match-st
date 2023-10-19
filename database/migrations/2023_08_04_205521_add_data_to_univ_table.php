<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewDataToTable extends Migration
{
    public function up()
    {
        // まずunivsテーブルが存在するか確認
        if (Schema::hasTable('univs')) {
            // テーブルが存在する場合、データを挿入
            DB::table('univs')->insert([
                'univ_name' => 'ChibaUniversityofCommerce',
                'locate' => 'Chiba',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // テーブルが存在しない場合、エラーメッセージを表示
            $this->command->error('univs table does not exist. Please run the migration to create it.');
        }
    }

    public function down()
    {
        // ダウンマイグレーションのロジックをここに追加
    }
}
