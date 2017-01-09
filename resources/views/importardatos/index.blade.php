@extends('layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
               
                
                <div class="panel panel-default">
                    <div class="panel-heading"> <i class="fa fa-download"></i> Importar OT de TIGO - INSTALACIONES
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            {!!Form::open(['route'=>'importar.store','method'=>'POST', 'files'=>true])!!}
                             <div class="col-lg-3 col-md-3">
                                <dl >
                                    <dt>Fecha de Asignacion OTs</dt>
                                    <dd>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        {!!Form::text('fechaimportado',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha Registro','id'=>'fechaimportado'])!!}
                                    </div>
                                    </dd>                                        
                                </dl>
                             </div>
                             <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Tipo Trabajos</dt>
                                    <dd>
                                      <div class="form-group">
                                      {!! Form::select('tipotrabajos', Config::get('constants.tipotrabajo'),null, ['class' => 'form-control pullright']) !!}
                                    </div>
                                    </dd>                                        
                                </dl>
                             </div>
                             <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>DPTO</dt>
                                    <dd>
                                      <div class="form-group">
                                      {!! Form::select('dpto', Config::get('constants.dpto'),null, ['class' => 'form-control pullright']) !!}
                                    </div>
                                    </dd>                                        
                                </dl>
                             </div>
                             <div class="col-lg-4 col-md-4">
                                <dl >
                                    <dt>Cargar Archivo OTs (Excel)</dt>
                                    <dd>{!! Form::file('archivo') !!}</dd>                                        
                                </dl>
                             </div>
                             {!!Form::submit('Subir Archivo', ['class'=>'btn btn-primary'])!!}
                                  {!! Form::close() !!}
                            
                        </div>

                      @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ Session::get('message')}}
                        </div>
                      @endif
                          
                 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection