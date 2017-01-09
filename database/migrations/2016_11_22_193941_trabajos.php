<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trabajos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigocliente');
            $table->string('nombrecliente')->nullable();
            //$table->string('tipotrabajo')->nullable();
            $table->datetime('fechageneracion')->nullable();
            //$table->date('fechaprogramacion')->nullable();
            $table->string('tipoconfig')->nullable();
            $table->string('ot');

            //$table->string('dealer')->nullable();
            //$table->string('zona')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('direccion')->nullable();
            //$table->string('referencia')->nullable();
            //$table->string('tipocasa')->nullable();
            //$table->string('colorcasa')->nullable();
            $table->string('tiposervicio')->nullable();
            $table->string('posgeo')->nullable();
            $table->string('altura')->nullable();
            //$table->string('codigocre')->nullable();
            $table->string('telefono1')->nullable();
            //$table->string('telefono2')->nullable();
            //$table->string('telefono3')->nullable();

            $table->string('tipotrabajo1')->nullable();
            $table->datetime('fechaimportado')->nullable();
            $table->datetime('fechaactualizado')->nullable();
            $table->string('areaactual')->nullable();
            $table->string('estado')->nullable();
            $table->string('motivo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('zonaasig')->nullable();
            $table->string('tecnicoasig')->nullable();
            $table->string('FK_usuario_id')->nullable();

            $table->string('horario')->nullable();

            $table->datetime('fechaimportadoasignado')->nullable();
            $table->string('descripcionimportado')->nullable();
            $table->string('dpto')->nullable();
            $table->string('origen')->nullable();
            $table->integer('FK_usuarioatiende_id')->default(0);
            $table->integer('nroatendido')->default(0);
            $table->string('tipoplanilla')->nullable();
            $table->string('area')->default(0);
                        
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
        Schema::drop('trabajos');
    }
}
