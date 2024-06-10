<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiclesTable extends Migration
{
    public function up()
    {
        Schema::create('cicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sigles', 10)->unique();
            $table->string('descripcio', 45);
            $table->boolean('actiu')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cicles');
    }
}
