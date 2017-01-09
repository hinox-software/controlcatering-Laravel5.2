@extends('layouts.app')

@section('htmlheader_title')
    Reportes Trabajos
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
                    <div class="panel-heading"> <i class="fa fa-users"></i> Reportes Trabajos
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                       <div class="row">
                            {!!Form::open(['route'=>'trabajos.generadocerrados','method'=>'POST'])!!}
                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Tipo Trabajos</dt>
                                    <dd>
                                        {!! Form::select('tipotrabajo', Config::get('constants.tipotrabajo'),null, ['class' => 'form-control pullright', 'id'=>'tipotrabajo']) !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <dl >
                                    <dt>Dpto</dt>
                                    <dd>{!! Form::select('dpto', Config::get('constants.dpto'),Session::get('dptoseleccionado'), ['class' => 'form-control pullright', 'id'=>'dpto']) !!}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <dl >
                                    <dt></dt>
                                    <dd>{!!Form::submit('Generar Listado', ['class'=>'btn btn-primary'])!!}
                                  
                                </dl>
                            </div>
                          
                        </div>
                        
                        {!! Form::close() !!}</dd>                                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection