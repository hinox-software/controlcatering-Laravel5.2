@extends('layouts.app')

@section('htmlheader_title')
    Usuarios
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
                    <div class="panel-heading"> <i class="fa fa-users"></i> Usuarios
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <table class="table">
                                <td> 
                                {!! link_to_route('user.create',$title = 'Nuevo Usuario',null, $attributes = ['class'=>'btn btn-info pull-right -primary' ]);!!}
                            </td>
                            </table>    
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Tipo</th>
                                <th>Dpto</th>
                                <th>Estado</th>
                                <th>INST</th>
                                <th>RETI</th>
                                <th>ASIS</th>
                                <th>COORD</th>
                                <th>CENTR</th>
                                <th>DIGIT</th>
                                
                            </thead>
                            @foreach ($usu as $p)
                            <tbody>
                                <td>{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->email}}</td>
                                <td>{{$p->tipo}}</td>
                                <td>{{$p->dpto}}</td>
                                <td>{{$p->estado}}</td>
                                <td>{{$p->activaInstalacion}}</td>
                                <td>{{$p->activaRetiro}}</td>
                                <td>{{$p->activaAsitencia}}</td>
                                <td>{{$p->activaCoordinacion}}</td>
                                <td>{{$p->activaCentralizacion}}</td>
                                <td>{{$p->activaDigitacion}}</td>
                                <td>
                                    {!! link_to_route('user.edit', $title = 'Editar', $parameters = $p->id, $attributes = ['class'=>'btn btn-primary']);!!}
                                </td>
                                <td>
                                    
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                        {!!$usu->render()!!}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection