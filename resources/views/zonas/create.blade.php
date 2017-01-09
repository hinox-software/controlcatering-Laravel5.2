@extends('layouts.app')

@section('htmlheader_title')
    Nueva Zona
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
                    <div class="panel-heading"> <i class="fa fa-map-marker"></i> Registro de Zonas
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                     <div class="panel-body">
                        @include('alertas/requerido')
                        {!!Form::open(['route'=>'zonas.store','method'=>'POST'])!!}
                        <div class="row">

                            
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Descripcion</dt>
                                    <dd>{!!Form::text('descripcion',null, ['id'=> 'descripcion','class'=>'form-control pullright'])!!}</dd>                                        
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