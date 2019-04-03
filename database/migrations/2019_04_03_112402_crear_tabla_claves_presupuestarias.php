<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaClavesPresupuestarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claves_presupuestarias', function(Blueprint $table)
		{
            
			$table->increments('id');
			$table->integer('id_comision')->unsigned();
            $table->string('nombre')->nullable();
            $table->string('sufijo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('claves_presupuestarias', function($table)
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
        Schema::drop('claves_presupuestarias');
    }
}
