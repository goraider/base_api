<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMotivosComisiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivos_comisiones', function(Blueprint $table)
		{
            
			$table->increments('id');
			$table->integer('comision_id')->unsigned();
            $table->string('status_observacion')->nullable();
            $table->string('observacion')->nullable();
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('motivos_comisiones', function($table)
        {
            $table->foreign('comision_id')->references('id')->on('comisiones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('motivos_comisiones');
    }
}
