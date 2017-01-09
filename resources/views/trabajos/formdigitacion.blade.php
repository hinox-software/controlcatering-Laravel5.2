<div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Trabajos:</b> {{ Config::get('constants.tipotrabajo.'.$tipotrabajo) }} - <b>Area:</b> {{ Config::get('constants.areas.'.$area) }} - <b>Adicionar Trabajo</b>
                    
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>    
                    <div class="panel-body">
                        {!!Form::model($tra,['route'=>['trabajos.updatetrabajos',$tra->id, $tipotrabajo, $area],'method'=>'PUT'])!!}
                         <div class="row">
                            <div class="col-lg-1 col-md-1">  
                                <dl >
                                    <dt>Fecha</dt>
                                    <dd> {{ Carbon\Carbon::now()->format('d/m/Y H:i')}}</dd>
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-Geo</dt>
                                    <dd>
                                        {!!Form::text('posgeo',$tra->posgeo, ['id'=> 'posgeo','class'=>'form-control pullright'])!!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Zona</dt>
                                    <dd>
                                        {!! Form::select('zona_id', $zona,$tra->zonaasig, ['class' => 'form-control pullright']) !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Tecnico</dt>
                                    <dd>
                                         {!! Form::select('tecnico_id', $tecnicos,$tra->tecnicoasig, ['class' => 'form-control pullright', 'readonly', 'disabled']) !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Horario</dt>
                                    <dd>
                                        {!! Form::select('horario_id', Config::get('constants.horarios'),$tra->horario, ['class' => 'form-control pullright', 'readonly', 'disabled']) !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div> 
                        <div class="row">
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd> 
                                        {!! Form::select('estado_id', Config::get('constants.estadoDigitacion'),null, ['class' => 'form-control pullright', 'id'=> 'estado_id']) !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Motivo</dt>
                                    <dd>
                                        {!! Form::select('motivo_id', Config::get('constants.motivoDigitacion.TERMINADO'),null, ['class' => 'form-control pullright', 'id'=> 'motivo_id']) !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-6 col-md-6">  
                                <dl >
                                    <dt>Descripcion del Trabajo</dt>
                                    <dd>
                                        {{ Form::textarea('descripcion_id', null, ['size' => '50x2']) }}
                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                {!! link_to_route('trabajos.mostrartrabajos', $title = 'Cancelar',[$tipotrabajo, $area], $attributes = ['class'=>'btn btn-primary']);!!}
                                {!!Form::submit('Registrar Trabajo', ['class'=>'btn btn-primary'])!!}
                                {!!Form::close()!!}
                            </div>
                        </div>        
                    </div> <!-- fin del panel-->   
                </div>    
            </div>    
        </div>
    </div>    