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
        // Schema::create('individuals_users', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('individual_id');
        //     $table->timestamps();
            
        //     // usersテーブルとの外部キー制約を設定
        //     $table->foreign('user_id')->references('id')->on('users');
            
        //     // individualsテーブルとの外部キー制約を指定
        //     $table->foreign('individual_id')->references('id')->on('individuals');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individuals_users');
    }
};
