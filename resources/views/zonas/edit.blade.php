@extends('layouts.app')

@section('htmlheader_title')
    Editar Zona
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
                    <div class="panel-heading"> <i class="fa fa-users"></i> Editar Zona
                         <div class="pull-right info">
                            <i class="fa fa-map-marker"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                     <div class="panel-body">
                        @include('alertas/requerido')
                        {!!Form::model($zona,['route'=>['zonas.update',$zona->id],'method'=>'PUT'])!!}
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
                                    {!! Form::select('dpto', Config::get('constants.dpto'),$zona->dpto, ['class' => 'form-control pullright']) !!}
                                </dl>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                {!!Form::submit('Actualizar ', ['class'=>'btn btn-primary'])!!}
                                {!!Form::close()!!}
                            </div>
                        </div> 
                                  

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection