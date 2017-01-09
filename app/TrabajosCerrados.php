<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TrabajosCerrados extends Model
{
     protected $table = 'trabajoscerrados';

    // declarar todos los campos para ser registrado de forma masiva.
    
    protected $fillable = [
     
     		'id',
     		'codigocliente',
            'nombrecliente',
            'fechageneracion',
            'tipoconfig',
            'ot',
            'poblacion',
            'direccion',
            'tiposervicio',
            'posgeo',
            'altura',
            'telefono1',
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
            'fechaimportadoasignado',
            'descripcionimportado',
            'dpto',
            'origen',
            'usuariocerrados',
            'fechacerrados',
            'nroatendido',
    ];

public function getFechaGeneracionAttribute()
  {
     return date('d/m/Y H:i',strtotime($this->attributes['fechageneracion']));
}
public function getFechaImportadoAttribute()
  {
     return date('d/m/Y H:i',strtotime($this->attributes['fechaimportado']));
}
public function getFechaActualizadoAttribute()
  {
     return date('d/m/Y H:i',strtotime($this->attributes['fechaactualizado']));
}
public function getFechaImportadoAsignadoAttribute()
  {
     return date('d/m/Y H:i',strtotime($this->attributes['fechaimportadoasignado']));
}
public function getFechaCerradosAttribute()
  {
     return date('d/m/Y H:i',strtotime($this->attributes['fechacerrados']));
}

/*public function setFechaGeneracionAttribute($date)
{
	$this->attributes['fechageneracion']=Carbon::createFromFormat('d/m/Y H:i:s', $date);
  }
public function setFechaImportadoAttribute($date)
  {
     $this->attributes['fechaimportado']=Carbon::createFromFormat('d/m/Y H:i', $date);
}
public function setFechaActualizadoAttribute($date)
  {
     $this->attributes['fechaactualizado']=Carbon::createFromFormat('d/m/Y H:i', $date);
}
public function setFechaImportadoAsignadoAttribute($date)
  {
     $this->attributes['fechaimportadoasignado']=Carbon::createFromFormat('d/m/Y H:i', $date);
}
public function setFechaCerradosAttribute($date)
  {
     $this->attributes['fechacerrados']=Carbon::createFromFormat('d/m/Y H:i', $date);
}*/

}
