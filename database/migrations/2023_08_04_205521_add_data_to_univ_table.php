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
        Schema::table('univ', function (Blueprint $table) {
            //
        });
        
        // データを追加する
        DB::table('univs')->insert([
            'univ_name' => 'ChibaUniversityofCommerce',
            'locate' => 'Chiba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('univ', function (Blueprint $table) {
            //
        });
    }
};
