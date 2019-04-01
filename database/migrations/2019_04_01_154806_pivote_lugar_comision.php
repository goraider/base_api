<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteLugarComision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugar_comision', function (Blueprint $table) {
            		
			$table->integer('lugar_id')->unsigned();
            $table->integer('comision_id')->unsigned();

			$table->foreign('lugar_id')
                  ->references('id')->on('lugares')
                  ->onDelete('cascade');

            $table->foreign('comision_id')
                  ->references('id')->on('comisiones')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lugar_comision');
    }
}
