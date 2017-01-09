@extends('layouts.app')

@section('htmlheader_title')
    Registro Manual OTs
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message')}}
                </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"> <i class="fa fa-users"></i> Registro Manual de OTs
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                     <div class="panel-body">
                        @include('alertas/requerido')
                        {!!Form::open(['route'=>'trabajos.store','method'=>'POST'])!!}
                        <div class="row">

                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Codigo Cliente</dt>
                                    <dd>{!!Form::text('codigocliente',null, ['id'=> 'codigocliente','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Nombre</dt>
                                    <dd>{!!Form::text('nombre',null, ['id'=> 'nombre','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Direccion</dt>
                                    <dd>{!!Form::text('direccion',null, ['id'=> 'direccion','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Telefono 1</dt>
                                    <dd>{!!Form::text('telefono1',null, ['id'=> 'telefono1','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Poblacion</dt>
                                    <dd>{!!Form::text('poblacion',null, ['id'=> 'poblacion','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-GEO</dt>
                                    <dd>{!!Form::text('posgeo',null, ['id'=> 'posgeo','class'=>'form-control pullright'])!!}</dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Tipos de Trabajos</dt>
                                    <dd> {!! Form::select('tipotrabajos', Config::get('constants.tipotrabajo'),null, ['class' => 'form-control pullright']) !!}</dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Dpto</dt>
                                    <dd>{!! Form::select('dpto', Config::get('constants.dpto'),null, ['class' => 'form-control pullright']) !!}</dd>
                                </dl>
                            </div>
                        </div>                     
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>F-Generacion</dt>
                                    <dd>
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        {!!Form::text('fechageneracion',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha Registro','id'=>'fechageneracion'])!!}
                                    </div>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>OT</dt>
                                    <dd>{!!Form::text('ot',null, ['id'=> 'ot','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Tipo </dt>
                                    <dd>{!!Form::text('tipo',null, ['id'=> 'tipo','class'=>'form-control pullright','placeholder'=>'D04, IP0, IP1'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Servicio</dt>
                                    <dd>{!!Form::text('servicio',null, ['id'=> 'servicio','class'=>'form-control pullright','placeholder'=>'AV, AE, ...'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Altura</dt>
                                    <dd>{!!Form::text('altura',null, ['id'=> 'altura','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                        </div>                     
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                {!!Form::submit('Registrar OT', ['class'=>'btn btn-primary'])!!}
                                {!!Form::close()!!}
                            </div>
                        </div> 
                                  

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection