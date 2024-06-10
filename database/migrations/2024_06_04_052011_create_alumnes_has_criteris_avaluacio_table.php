<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnesHasCriterisAvaluacioTable extends Migration
{
    public function up()
{
    if (!Schema::hasTable('alumnes_has_criteris_avaluacio')) {
        Schema::create('alumnes_has_criteris_avaluacio', function (Blueprint $table) {
            $table->unsignedBigInteger('usuaris_id');
            $table->unsignedBigInteger('criteris_avaluacio_id');
            $table->integer('nota')->default(0);
            $table->primary(['usuaris_id', 'criteris_avaluacio_id']);

            $table->foreign('usuaris_id')->references('id')->on('usuaris')->onDelete('cascade');
            $table->foreign('criteris_avaluacio_id')->references('id')->on('criteris_avaluacio')->onDelete('cascade');
        });
    }
}

    public function down()
    {
        Schema::dropIfExists('alumnes_has_criteris_avaluacio');
    }
}
