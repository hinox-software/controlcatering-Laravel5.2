<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Historial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigocliente');
            $table->string('ot');
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
            $table->string('posgeo')->nullable();              
            $table->string('origen')->nullable();
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
        Schema::drop('historial');
        
    }
}
