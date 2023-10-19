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
        Schema::create('table_individuals', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('summary', 200);
            $table->enum('category', ['qualification', 'product', 'topic']);
            $table->integer('admin_id');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_individuals');
    }
};
