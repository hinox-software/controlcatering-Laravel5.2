<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
     protected $table = 'historial';

    // declarar todos los campos para ser registrado de forma masiva.
    
    protected $fillable = [
     
     		'codigocliente',
        'ot',
        'tipotrabajo1',
        'fechaimportado',
        'fechaactualizado',
        'areaactual',
        'estado',
        'motivo',
        'descripcion',
        'zonaasig',
        'tecnicoasig',
        'FK_usuario_id',
        'horario',
        'posgeo',
        'origen',
    ];

 public function usuario()
  {
    return $this->belongsTo('App\User','FK_usuario_id','id');
  }
  
}
