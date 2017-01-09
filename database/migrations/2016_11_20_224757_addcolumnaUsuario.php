<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddcolumnaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('tipo')->nullable();
            $table->string('dpto')->nullable();
            $table->boolean('estado')->nullable();
            $table->string('activaInstalacion')->nullable();
            $table->string('activaRetiro')->nullable();
            $table->string('activaAsitencia')->nullable();
            $table->string('activaCoordinacion')->nullable();
            $table->string('activaCentralizacion')->nullable();
            $table->string('activaDigitacion')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
