<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('TipoPersona');
            $table->string('RazonSocial')->nullable();
            $table->string('TipoDocumento');
            $table->string('NumeroDocumento');
            $table->string('Nombres');
            $table->string('Telefono')->nullable();
            $table->string('Email')->nullable();
            $table->string('Ciudad')->nullable();
            $table->string('Calle')->nullable();
            $table->integer('Numero')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
