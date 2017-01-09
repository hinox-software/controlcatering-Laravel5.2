@extends('layouts.app')

@section('htmlheader_title')
    Tecnicos
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
                    <div class="panel-heading"> 

                        <i class="fa fa-user-plus"></i> 
                        <b>Tecnicos</b> 
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                        <td> 
                            {!! link_to_route('tecnicos.create',$title = 'Nuevo Tecnico',null, $attributes = ['class'=>'btn btn-info pull-right -primary' ]);!!}
                        </td>
                        <div class="row">
                              
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>CI</th>
                                <th>Telefono</th>
                                <th>Empresa</th>
                                <th>Estado</th>
                                <th>Comandos</th>
                                
                            </thead>
                            @foreach ($tec as $p)
                            <tbody>
                                <td>{{$p->id}}</td>
                                <td>{{$p->codigo}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->ci}}</td>
                                <td>{{$p->telefono}}</td>
                                <td>{{$p->empresa}}</td>
                                <td></td>
                                <td>
                                    {!! link_to_route('tecnicos.edit', $title = 'Editar', $parameters = $p->id, $attributes = ['class'=>'btn btn-primary']);!!}
                                </td>
                                
                            </tbody>
                            @endforeach
                        </table>
                        {!!$tec->render()!!}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection