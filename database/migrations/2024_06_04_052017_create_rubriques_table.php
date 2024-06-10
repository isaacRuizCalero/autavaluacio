<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubriquesTable extends Migration
{
    public function up()
    {
        Schema::create('rubriques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nivell');
            $table->string('descripcio', 256);
            $table->boolean('actiu')->default(true);
            $table->integer('criteris_avaluacio_id')->unsigned();
            $table->foreign('criteris_avaluacio_id')->references('id')->on('criteris_avaluacio')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rubriques');
    }
}
