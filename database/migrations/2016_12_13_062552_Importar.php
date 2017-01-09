<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Importar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importar', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fechaimportado')->nullable();
            $table->string('nombrearchivo')->nullable();
            $table->string('path')->nullable();
            $table->string('tipotrabajos')->nullable();
            $table->date('fechaasignado')->nullable();
            $table->string('FK_usuario_id')->nullable();
            $table->string('dpto')->nullable();
            $table->string('tipoplanilla')->nullable();
                        
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('importar');
    }
}
