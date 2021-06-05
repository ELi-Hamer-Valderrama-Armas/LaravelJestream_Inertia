<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_producto', function (Blueprint $table) {

            $table->foreignId('salida_id')

                ->constrained('salidas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('producto_id')
                ->constrained('productos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

           
                $table->Date('Fecha')->nullable();
                $table->Decimal('precio', 8, 2)->nullable();
                $table->Integer('cantidad');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salida_producto');
    }
}
