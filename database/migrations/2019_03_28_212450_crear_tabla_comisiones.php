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
            $table->integer('usuario_id')->nullable();
            $table->string('folio')->unique();
            $table->string('ejercicio');

            // $table->integer('tipos_comisiones_id')->unsigned();
            // $table->integer('tipos_viajes_id')->unsigned();
            // $table->integer('descripciones_partidas_id')->unsigned();
            // $table->integer('claves_partidas_id')->unsigned();

            
            $table->date('fecha_actual');
            $table->date('fecha_captura');
            $table->date('fecha_entrega');
            $table->date('fecha_validacion')->nullable();
            $table->string('motivo_comision');
            $table->boolean('aprovacion')->default(false);
            $table->timestamps();
            $table->softDeletes();
            
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
