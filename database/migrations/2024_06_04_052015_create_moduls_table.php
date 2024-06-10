<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulsTable extends Migration
{
    public function up()
    {
        Schema::create('moduls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codi', 10);
            $table->string('sigles', 10);
            $table->string('nom', 45);
            $table->boolean('actiu')->default(true);
            $table->integer('cicles_id')->unsigned();
            $table->foreign('cicles_id')->references('id')->on('cicles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('moduls');
    }
}
