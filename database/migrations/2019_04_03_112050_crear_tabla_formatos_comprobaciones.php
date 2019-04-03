<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFormatosComprobaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatos_comprobaciones', function(Blueprint $table)
		{
            
			$table->increments('id');
			$table->integer('id_comision')->unsigned();
            $table->string('tipo_comprobacion');
            $table->string('url');
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('formatos_comprobaciones', function($table)
        {
            $table->foreign('id_comision')->references('id')->on('comisiones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('formatos_comprobaciones');
    }
}
