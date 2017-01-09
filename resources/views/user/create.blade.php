@extends('layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection


@section('main-content')
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa  fa-users"></i> Registrar Usuario   
            </div>

        <!-- INICIO BODY-->
        <div class="panel-body">
         @include('alertas/requerido')
         {!!Form::open(['route'=>'user.store','method'=>'POST'])!!}
            <div class="row">
            <div class="col-lg-6 col-md-6">  
                <div class="form-group">
                    {!!Form::label('Nombre')!!}
                    {!!Form::text('name', null , ['class'=>'form-control pullright','placeholder'=>'Nombre'])!!}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    {!!Form::label('Correo')!!}
                    {!!Form::text('email', null, ['class'=>'form-control pullright','placeholder'=>'Correo'])!!}
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
                    {!! Form::select('tipo', Config::get('constants.tipouser'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Dpto')!!}
                    {!! Form::select('dpto', Config::get('constants.dpto'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    {!!Form::label('Estado')!!}
                    {!! Form::select('estado', Config::get('constants.estado'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Instalaciones')!!}
                    {!! Form::select('activaInstalacion', Config::get('constants.activaInstalacion'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Retiros')!!}
                    {!! Form::select('activaRetiro', Config::get('constants.activaRetiro'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    {!!Form::label('Asistencia')!!}
                    {!! Form::select('activaAsitencia', Config::get('constants.activaAsitencia'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            </div>
            
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Coordinacion')!!}
                    {!! Form::select('activaCoordinacion', Config::get('constants.activaCoordinacion'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    {!!Form::label('Centralizacion')!!}
                    {!! Form::select('activaCentralizacion', Config::get('constants.activaCentralizacion'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    {!!Form::label('Digitacion')!!}
                    {!! Form::select('activaDigitacion', Config::get('constants.activaDigitacion'),null, ['class' => 'form-control pullright']) !!}
                </div>
            </div>
            </div>
        {!! link_to_route('user.index', $title = 'Cancelar',(''), $attributes = ['class'=>'btn btn-primary']);!!}
        {!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
         {!!Form::close()!!}
         <div class="row">
        <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    {!!Form::label('Fecha Registro')!!}
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                            {!!Form::text('fecha_registro',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha Registro','id'=>'fecha_registro'])!!}
                    </div>
                </div> 
            </div>
        </div>

        
        </div>               
        </div>
    </div>
</div>


@endsection