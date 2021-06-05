<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->Date('Fecha')->nullable();
            $table->string('TipoComprobante')->nullable();
            $table->integer('SerieComprobante')->nullable();
            $table->integer('NumeroComprobante')->nullable();
            $table->integer('Impuesto')->nullable();
            $table->Decimal('Total', 8, 2)->nullable();

            $table->foreignId('persona_id')
                ->constrained('personas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('ingresos');
    }
}
