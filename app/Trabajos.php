<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajos extends Model
{
     protected $table = 'trabajos';

    // declarar todos los campos para ser registrado de forma masiva.
    
    protected $fillable = [
     
     		    'codigocliente',
            'nombrecliente',
            //'tipotrabajo',
            'fechageneracion',
            //'fechaprogramacion',
            'tipoconfig',
            'ot',
            //'dealer',
            //'zona',
            'poblacion',
            'direccion',
           // 'referencia',
            //'tipocasa',
            //'colorcasa',
            'tiposervicio',
            'posgeo',
            'altura',
            //'codigocre',
            'telefono1',
            //'telefono2',
            //'telefono3',
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
            'FK_usuarioatiende_id',
            'nroatendido',
            'tipoplanilla',
    ];

     
    
  public function usuario()
  {
    return $this->belongsTo('App\User','FK_usuario_id','id');
  }
  public function usuarioatiende()
  {
    return $this->belongsTo('App\User','FK_usuarioatiende_id','id');
  }

public function getFechaImportadoAsignadoAttribute()
  {
     return date('d/m/Y',strtotime($this->attributes['fechaimportadoasignado']));
}
/*

public function setFechaEntregaAttribute($date)
{
	$this->attributes['fecha_entrega']=Carbon::createFromFormat('d/m/Y', $date);		
  }
    public function getFechaEntregaAttribute()
  {
    return date('d/m/Y',strtotime($this->attributes['fecha_entrega']));
}

    public function setFechaRecepcionAttribute($date)
{
	$this->attributes['fecha_recepcion']=Carbon::createFromFormat('d/m/Y', $date);		
  }
    public function getFechaRecepcionAttribute()
  {
    return date('d/m/Y',strtotime($this->attributes['fecha_recepcion']));
}*/
}
