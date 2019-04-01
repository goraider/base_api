<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLugares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('lugares', function(Blueprint $table)
		{
            
			$table->increments('id');
			//$table->integer('comisiones_id')->unsigned();
            $table->string('sede'); //a que lugar del instituto o lugar que asistira

            
            $table->string('pais_origen_id')->nullable();
            $table->string('estado_origen_id')->nullable();
            $table->string('municipio_origen_id')->nullable();

            $table->string('pais_destino_id')->nullable();
            $table->string('estado_destino_id')->nullable();
            $table->string('municipio_destino_id')->nullable();
            
            $table->date('fecha_salida');
            $table->date('fecha_regreso');

            $table->string('importe');
            $table->string('numero_dias');
            $table->string('subtotal');
            $table->string('total');
            $table->boolean('es_nacional')->default(false);

            $table->timestamps();
            $table->softDeletes();
		});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lugares');
    }
}
