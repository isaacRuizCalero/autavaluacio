<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom_usuari')->unique();
            $table->string('contrasenya');
            $table->string('correu')->unique();
            $table->string('nom');
            $table->string('cognom');
            $table->boolean('actiu')->default(1);
            $table->unsignedBigInteger('tipus_usuaris_id');
            $table->timestamps();
            
            $table->foreign('tipus_usuaris_id')->references('id')->on('tipus_usuaris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
