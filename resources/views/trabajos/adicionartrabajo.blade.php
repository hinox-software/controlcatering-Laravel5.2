@extends('layouts.app')

@section('htmlheader_title')
    Trabajos X Area
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 ">
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message')}}
                </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"> 

                        <i class="fa fa-user-plus"></i> 
                        <b>Trabajos:</b> {{ Config::get('constants.tipotrabajo.'.$tipotrabajo) }} - <b>Area:</b> {{ Config::get('constants.areas.'.$area) }} - <b>Adicionar Trabajo</b>
                        {{ Form::hidden('area_id', $area,array('id' => 'area_id')) }}
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Codigo Cliente</dt>
                                    <dd>{{$tra->codigocliente}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Nombre</dt>
                                    <dd>{{$tra->nombrecliente}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Direccion</dt>
                                    <dd>{{$tra->direccion}}</dd>                                        
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Telefono 1</dt>
                                    <dd>{{$tra->telefono1}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Poblacion</dt>
                                    <dd>{{$tra->poblacion}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-GEO</dt>
                                    <dd>{{$tra->posgeo}}</dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                        </div>                     
                        <div class="row">
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>F-Generacion</dt>
                                    <dd>{{$tra->fechageneracion}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>OT</dt>
                                    <dd>{{$tra->ot}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Tipo</dt>
                                    <dd>{{$tra->tipoconfig}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Servicio</dt>
                                    <dd>{{$tra->tiposervicio}}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Altura</dt>
                                    <dd>{{$tra->altura}}</dd>                                        
                                </dl>
                            </div>
                        </div>                     
                        
                                  

                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($area === Config::get('constants.areasnumero.COORDINACION'))
        @include('trabajos.formcoordinacion')
    @endif
    @if ($area === Config::get('constants.areasnumero.CENTRALIZACION'))
        @include('trabajos.formcentralizacion')
    @endif
    @if ($area === Config::get('constants.areasnumero.DIGITACION'))
        @include('trabajos.formdigitacion')
    @endif
    

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        HISTORIAL DE TRABAJOS DEL CLIENTE
                    </div>    
                    <div class="panel-body">
                        @include('trabajos.formhistorial')
                    </div>    
                </div>    
            </div>    
        </div>
    </div>

@endsection