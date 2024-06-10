<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarisTable extends Migration
{
    public function up()
    {
        Schema::create('usuaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_usuari', 45)->unique();
            $table->string('contrasenya', 256)->nullable;
            $table->string('correu', 45)->unique();
            $table->string('nom', 45);
            $table->string('cognom', 45);
            $table->boolean('actiu')->default(true);
            $table->integer('tipus_usuaris_id')->unsigned();
            $table->foreign('tipus_usuaris_id')->references('id')->on('tipus_usuaris')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuaris');
    }
}
