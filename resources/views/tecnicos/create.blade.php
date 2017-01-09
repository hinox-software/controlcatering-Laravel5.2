@extends('layouts.app')

@section('htmlheader_title')
    Nuevo Tecnico
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
                    <div class="panel-heading"> <i class="fa fa-users"></i> Registro de Tecnicos
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                     <div class="panel-body">
                        @include('alertas/requerido')
                        {!!Form::open(['route'=>'tecnicos.store','method'=>'POST'])!!}
                        <div class="row">

                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Codigo</dt>
                                    <dd>{!!Form::text('codigo',null, ['id'=> 'codigo','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Nombre</dt>
                                    <dd>{!!Form::text('nombre',null, ['id'=> 'nombre','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>CI</dt>
                                    <dd>{!!Form::text('ci',null, ['id'=> 'ci','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Telefono</dt>
                                    <dd>{!!Form::text('telefono',null, ['id'=> 'telefono','class'=>'form-control pullright'])!!}</dd>                                        
                                    
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Empresa</dt>
                                    <dd>{!!Form::text('empresa',null, ['id'=> 'empresa','class'=>'form-control pullright'])!!}</dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd></dd>
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
                            <div class="col-lg-10 col-md-10">
                                {!!Form::submit('Registrar ', ['class'=>'btn btn-primary'])!!}
                                {!!Form::close()!!}
                            </div>
                        </div> 
                                  

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection