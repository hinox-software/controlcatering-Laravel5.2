<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crea el administrador
        User::create([
        	'name' 				=>	'Johnny Hinojosa',
        	'email'				=>	'jhinojosa@hinox-software.com',
        	'password'			=>	bcrypt('Passw0rd6102'),
        	'tipo'				=>	config('constants.tipouser.ADMIN'),
        	'dpto'				=>	config('constants.dpto.SCZ'),
        	'estado'			=>	config('constants.estado.0'),
        	'activaInstalacion'	=>	config('constants.activaInstalacion.SI'),
        	'activaRetiro'		=>	config('constants.activaRetiro.SI'),
        	'activaAsitencia'	=>	config('constants.activaAsitencia.SI'),
        	'activaCoordinacion'	=>	config('constants.activaCoordinacion.SI'),
        	'activaCentralizacion'	=>	config('constants.activaCentralizacion.SI'),
        	'activaDigitacion'	=>	config('constants.activaDigitacion.SI'),

        ]);

    }
}
