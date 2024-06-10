<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatsAprenentatgeTable extends Migration
{
    public function up()
    {
        Schema::create('resultats_aprenentatge', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordre');
            $table->string('descripcio', 256);
            $table->boolean('actiu')->default(true);
            $table->integer('moduls_id')->unsigned();
            $table->foreign('moduls_id')->references('id')->on('moduls')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultats_aprenentatge');
    }
}
