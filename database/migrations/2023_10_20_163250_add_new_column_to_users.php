<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('univ', 255)->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('grade', ['学部1年', '学部2年', '学部3年', '学部4年', '修士1年', '修士2年', '博士1年', '博士2年', '博士3年'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('univ');
            $table->dropColumn('birthdate');
            $table->dropColumn('grade');
        });
    }
}