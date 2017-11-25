<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dil')->unique();
            $table->string('kisaltma')->unique();
            $table->string('bayrak',500);
            $table->integer('order')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('title',255);
            $table->string('keyw',255);
            $table->string('desc',255);
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
        Schema::dropIfExists('langs');
    }
}
