<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_ingreso', function (Blueprint $table) {
             $table->id();
            $table->foreignId('producto_id')
                ->constrained('productos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('ingreso_id')
                ->constrained('ingresos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->Decimal('precio', 8, 2)->nullable();
            $table->Integer('cantidad');
             $table->Decimal('monto', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_ingreso');
    }
}
