<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaComisiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisiones', function (Blueprint $table) {

            $table->increments('id');
            $table->string('motivo_comision');
            $table->string('no_comision');
            $table->string('no_memorandum');
            $table->integer('usuario_id')->unsigned();
            $table->string('nombre_proyecto')->nullable();
            $table->decimal('total', 8,2)->change();
            $table->boolean('es_vehiculo_oficial')->default(false);
            $table->string('tipo_comision', 5)->comment('para identificacion del tipo de comision y su flujo');
            $table->string('placas')->nullable();
            $table->string('modelo')->nullable();
            $table->boolean('status_comision')->default(false);
            $table->string('funcionario_autoriza_comision')->nullable();
            $table->string('puesto_autoriza_comision')->nullable();
            // agregados recientemente
            $table->date('fecha');
            $table->string('organo_responsable', 250);





            // $table->integer('tipos_comisiones_id')->unsigned();
            // $table->integer('tipos_viajes_id')->unsigned();
            // $table->integer('descripciones_partidas_id')->unsigned();
            // $table->integer('claves_partidas_id')->unsigned();


            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('comisiones', function($table)
        {
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });

        // Schema::table('comisiones', function($table) {
        //     $table->foreign('tipos_comisiones_id')->references('id')->on('tipos_comisiones')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('tipos_viajes_id')->references('id')->on('tipos_viajes')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('claves_partidas_id')->references('id')->on('claves_partidas')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('descripciones_partidas_id')->references('id')->on('descripciones_partidas')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comisiones');
    }
}
