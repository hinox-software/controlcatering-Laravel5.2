@extends('layouts.app')

@section('htmlheader_title')
    Zonas
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

                        <i class="fa fa-map-marker"></i> 
                        <b>Zonas</b> 
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                        <td> 
                            {!! link_to_route('zonas.create',$title = 'Nueva Zona',null, $attributes = ['class'=>'btn btn-info pull-right -primary' ]);!!}
                        </td>
                        <div class="row">
                              
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Descripcion</th>
                                <th>Dpto</th>
                                <th>Comandos</th>
                                
                            </thead>
                            @foreach ($zona as $p)
                            <tbody>
                                <td>{{$p->id}}</td>
                                <td>{{$p->descripcion}}</td>
                                <td>{{$p->dpto}}</td>
                                <td>
                                    {!! link_to_route('zonas.edit', $title = 'Editar', $parameters = $p->id, $attributes = ['class'=>'btn btn-primary']);!!}
                                </td>
                                
                            </tbody>
                            @endforeach
                        </table>
                        {!!$zona->render()!!}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection