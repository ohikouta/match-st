<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewDataToTable extends Migration
{
    public function up()
    {
        // データを挿入
        DB::table('univs')->insert([
            'univ_name' => 'ChibaUniversityofCommerce',
            'locate' => 'Chiba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        // ダウンマイグレーションのロジックをここに追加
    }
}
