<?php

return [
    'tipouser' => [
        'ADMIN' => 'ADMIN',
        'OPERADOR' => 'OPERADOR',
        'VISOR' => 'VISOR',
    ],
    'dpto' => [
        'SCZ' => 'SCZ',
        'LPZ' => 'LPZ',
        'CBBA' => 'CBBA',
        'ORU-POT-SUC' => 'ORU-POT-SUC',
    ],
    'estado' => [
        '0' => 'HABILITADO',
        '1' => 'DESHABILITADO',
    ],
    'activaInstalacion' => [
        'SI' => 'SI',
        'NO' => 'NO',
    ],
    'activaRetiro' => [
        'SI' => 'SI',
        'NO' => 'NO',
    ],
    'activaAsitencia' => [
        'SI' => 'SI',
        'NO' => 'NO',
    ],
    'activaCoordinacion' => [
        'SI' => 'SI',
        'NO' => 'NO',
    ],
    'activaCentralizacion' => [
        'SI' => 'SI',
        'NO' => 'NO',
    ],
    'activaDigitacion' => [
        'SI' => 'SI',
        'NO' => 'NO',
    ],
    'estadoinicial' => [
        'REGISTRADO'   => 'REGISTRADO',
       /* 'CONFIRMADO'   => 'CONFIRMADO',
        'ATENDIDO'     => 'ATENDIDO',
        'CERRADO'      => 'CERRADO',
        'ASIGNADO'      => 'ASIGNADO',
        'EJECUTADO'    => 'EJECUTADO',
        'PENDIENTE'    => 'PENDIENTE',
        */
    ],
    'estadoCoordinacion' => [
        'ATENDIDO'     => 'ATENDIDO',
        'CONFIRMADO'   => 'CONFIRMADO',
        'CERRADO'      => 'CERRADO',
    ],
    
    'motivo' => [
        'REGISTRADO' => [
                        '0' =>'DATOS IMPORTADO',
                        ],
        'CONFIRMADO' => [
                        '0' =>'OK',
                        ],
        'ATENDIDO' => [
                        '0' =>'Usuario - No Contesta',
                        '1' =>'Usuario - No Desea el Servicio',
                        '2' =>'Usuario - Continuara con el Servicio',
                        '3' =>'Usuario - Telefono Apagado',
                        '4' =>'Usuario - Cuelga la Llamada',
                        '5' =>'Usuario - No conocen al Abonado',
                        '6' =>'Usuario - Familiar sin Informacion',
                        '7' =>'Usuario - Volver a Llamar',
                        ],
        'CERRADO' => [
                        '0' =>'Usuario - Sin Comunicacion',
                        '1' =>'Usuario - No desea mas Llamadas',
                        '2' =>'Usuario - Pasara por Oficinas de Tigo',
                        '3' =>'DATA RED - Zona Alejada',
                        '4' =>'TIGO - Atencion otro Dealer',
                        '5' =>'TIGO - Mal Asignada',
                        ],                

    ],
    'estadoCentralizacion' => [
        'ASIGNADO'     => 'ASIGNADO',
        'EJECUTADO'    => 'EJECUTADO',
        'CERRADO'      => 'CERRADO',
        'PENDIENTE'    => 'PENDIENTE',
    ],

    'motivoCentralizacion' => [
        'ASIGNADO' => [
                        '0' =>'OK',
                        ],
        'EJECUTADO' => [
                        '0' =>'OK',
                        ],
        'CERRADO' => [
                        '0' =>'Usuario - Sin Comunicacion',
                        '1' =>'Usuario - Se encuentra de Viaje',
                        '2' =>'Usuario - No desea el Servicio',
                        '3' =>'Usuario - Debe instalar torre',
                        '4' =>'Falla Tecnica - Derivado a Red de Cable',
                        '5' =>'Falla Tecnica - Sin disponibilidad del Servicio',
                        '6' =>'CODIGO 9 - Reembolso',
                        ],
        'PENDIENTE' => [
                        '0' =>'Usuario - Reprogramar Fecha',
                        '1' =>'Usuario - Se encuentra de Viaje',
                        '2' =>'Usuario - Volver a Llamar',
                        '3' =>'DATA RED - Se enviara Tecnico a la Zona',
                        ],

    ],
    'estadoDigitacion' => [
        'TERMINADO'      => 'TERMINADO',
        'NO_CERRADO'    => 'NO_CERRADO',
    ],
    'motivoDigitacion' => [
        'TERMINADO' => [
                        '0' =>'OK',
                        ],
        'NO_CERRADO' => [
                        '0' =>'DATA RED - Tecnico no tiene Boleta',
                        '1' =>'DATA RED - Falta informacion',
                        '2' =>'TIGO - Error de Parametros',
                        '3' =>'TIGO - No hay Sistema',
                        ],                

    ],


    'areas' => [
        '0'     => 'COORDINACION',
        '1'     => 'CENTRALIZACION',
        '2'     => 'DIGITACION',
        '3'     => 'REGISTRO',

    ],
    'areasnumero' => [
        'COORDINACION'      => '0',
        'CENTRALIZACION'    => '1',
        'DIGITACION'        => '2',
        'REGISTRO'        => '3',
        
    ],
    'tipotrabajo' => [
        '100' => 'INSTALACION',
        '200' => 'RETIROS_SOLICITADOS',
        '300' => 'ASISTENCIAS',
        '400' => 'RETIROS_GENERADOS',
    ],
    'tipotrabajonumero' => [
        'INSTALACION'           => '100',
        'RETIROS_SOLICITADOS'   => '200',
        'ASISTENCIAS'           => '300',
        'RETIROS_GENERADOS'     => '400',
        
    ],
    'zonas' => [
        'S/Z' => 'S/Z',
        'ZONA-1' => 'ZONA-1',
        'ZONA-2' => 'ZONA-2',
        'ZONA-3' => 'ZONA-3',
        'ZONA-4' => 'ZONA-4',
    ],
    'tecnicos' => [
        'S/Tecnico' => 'S/Tecnico',
        'Javier Rojas' => 'Javier Rojas',
        'Pedro Picapiedra' => 'Pedro Picapiedra',
        'Pablo Marmol' => 'Pablo Marmol',
        'Enrique Iglesias' => 'Enrique Iglesias',
        'Cristiano Ronaldo' => 'Cristiano Ronaldo',
    ],
    'horarios' => [
        'M1' => 'M1-08:00 a 10:00',
        'M2' => 'M2-10:00 a 12:00',
        'MD' => 'MD-12:00 a 14:00',
        'T1' => 'T1-14:00 a 16:00',
        'T2' => 'T2-16:00 a 18:00',
        'N1' => 'N1-18:00 a 22:00',
        'DD' => 'DD-Dias Domingos',
        'DF' => 'DF-Dias Feriados',
        'TD' => 'TD-Todo el Dia',
    ],
];