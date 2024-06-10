<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarisHasModulsTable extends Migration
{
    public function up()
    {
        Schema::create('usuaris_has_moduls', function (Blueprint $table) {
            $table->integer('usuaris_id')->unsigned();
            $table->integer('moduls_id')->unsigned();
            $table->primary(['usuaris_id', 'moduls_id']);
            $table->foreign('usuaris_id')->references('id')->on('usuaris')->onDelete('cascade');
            $table->foreign('moduls_id')->references('id')->on('moduls')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuaris_has_moduls');
    }
}
