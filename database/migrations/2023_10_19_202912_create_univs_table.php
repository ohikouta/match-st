<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivsTable extends Migration
{
    public function up()
    {
        Schema::create('univs', function (Blueprint $table) {
            $table->id();
            $table->string('univ_name');
            $table->string('locate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('univs');
    }
}
