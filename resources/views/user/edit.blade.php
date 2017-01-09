@extends('layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection


@section('main-content')
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa  fa-users"></i> Editar Usuario
                
            </div>

        <!-- INICIO BODY-->
        <div class="panel-body">
         @include('alertas/requerido')
         {!!Form::model($usu,['route'=>['user.update',$usu->id],'method'=>'PUT'])!!}
            <div class="row">
            <div class="col-lg-6 col-md-6">  
                <div class="form-group">
                    {!!Form::label('Nombre')!!}
                    {!!Form::text('name', $usu->name , ['class'=>'form-control pullright','placeholder'=>'Nombre'])!!}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    {!!Form::label('Correo')!!}
                    {!!Form::text('email', $usu->email, ['class'=>'form-control pullright','placeholder'=>'Correo','readonly'])!!}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    {!!Form::label('Contraseña')!!}
                    {!!Form::password('password', null, ['class'=>'form-control pullright'])!!}
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Tipo')!!}
                    {!! Form::select('tipo', Config::get('constants.tipouser'),$usu->tipo, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Dpto')!!}
                    {!! Form::select('dpto', Config::get('constants.dpto'),$usu->dpto, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    {!!Form::label('Estado')!!}
                    {!! Form::select('estado', Config::get('constants.estado'),$usu->estado, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Instalaciones')!!}
                    {!! Form::select('activaInstalacion', Config::get('constants.activaInstalacion'),$usu->activaInstalacion, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Retiros')!!}
                    {!! Form::select('activaRetiro', Config::get('constants.activaRetiro'),$usu->activaRetiro, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    {!!Form::label('Asistencia')!!}
                    {!! Form::select('activaAsitencia', Config::get('constants.activaAsitencia'),$usu->activaAsitencia, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            </div>
            
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Coordinacion')!!}
                    {!! Form::select('activaCoordinacion', Config::get('constants.activaCoordinacion'),$usu->activaCoordinacion, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Centralizacion')!!}
                    {!! Form::select('activaCentralizacion', Config::get('constants.activaCentralizacion'),$usu->activaCentralizacion, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    {!!Form::label('Digitacion')!!}
                    {!! Form::select('activaDigitacion', Config::get('constants.activaDigitacion'),$usu->activaDigitacion, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            </div>
        {!! link_to_route('user.index', $title = 'Cancelar',(''), $attributes = ['class'=>'btn btn-primary']);!!}
        {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
         {!!Form::close()!!}
         
        
        </div>               
        </div>
    </div>
</div>


@endsection