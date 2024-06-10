<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipusUsuarisTable extends Migration
{
    public function up()
    {
        Schema::create('tipus_usuaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipus', 45);
            $table->boolean('actiu')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipus_usuaris');
    }
}
