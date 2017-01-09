<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Importar extends Model
{
    protected $table = 'importar';

    // declarar todos los campos para ser registrado de forma masiva.
    
    protected $fillable = [
     
         		'fechaimportado',
         		'nombrearchivo',
            'path',
            'tipotrabajos',
            'fechaasignado',
            'FK_usuario_id',
            'dpto',
            'tipoplanilla',
    ];

public function usuario()
  {
    return $this->belongsTo('App\User','FK_usuario_id','id');
  }
public function getFechaImportadoAttribute()
  {
     return date('d/m/Y H:i',strtotime($this->attributes['fechaimportado']));
}
public function getFechaAsignadoAttribute()
  {
     return date('d/m/Y',strtotime($this->attributes['fechaasignado']));
}
public function getTipoTrabajosAttribute()
  {
     return config('constants.tipotrabajo.'.$this->attributes['tipotrabajos']);
}

/*public function setTipoTrabajosAttribute($value)
  {
     $this->attributes['tipotrabajos'] = config('constants.tipotrabajonumero.'.$value);
     
}*/
public function setFechaAsignadoAttribute($value)
  {
    $this->attributes['fechaasignado'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
  }

    
}
