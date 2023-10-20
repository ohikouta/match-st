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
        Schema::create('bases', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('univ', 50);
            $table->text('body');
            $table->timestamps(0);  // タイムスタンプのプリセットを無効にする
            $table->softDeletes(); // 論理削除のためのカラムを追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bases');
    }
}
