<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriterisAvaluacioTable extends Migration
{
    public function up()
    {
        Schema::create('criteris_avaluacio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordre');
            $table->string('descripcio', 256);
            $table->boolean('actiu')->default(true);
            $table->integer('resultats_aprenentatge_id')->unsigned();
            $table->foreign('resultats_aprenentatge_id')->references('id')->on('resultats_aprenentatge')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('criteris_avaluacio');
    }
}
