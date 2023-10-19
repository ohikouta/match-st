<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('univs')) {
            Schema::table('univs', function (Blueprint $table) {
                // テーブルが存在する場合にカラムの追加やデータの挿入を行います
                // 今回は何も追加するカラムがないため、空のままにします
            });

            // データを挿入します
            DB::table('univs')->insert([
                'univ_name' => 'ChibaUniversityofCommerce',
                'locate' => 'Chiba',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('univs')) {
            Schema::table('univs', function (Blueprint $table) {
                // テーブルが存在する場合に必要な処理を行います
            });
        }
    }
};
