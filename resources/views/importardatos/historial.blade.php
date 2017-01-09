@extends('layouts.app')

@section('htmlheader_title')
    Historial de Archivos Importados
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
                        <b>Historial de Archivos Importados</b> 
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                              
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Tipo Planilla</th>
                                <th>Fecha Importado</th>
                                <th>Nombre Archivo</th>
                                <th>Fecha Asignado</th>
                                <th>Tipo de Trabajo</th>
                                <th>Dpto</th>
                                <th>Usuario</th>
                                
                                
                                
                                
                            </thead>
                            @foreach ($imp as $p)
                            <tbody>
                                <td>{{$p->id}}</td>
                                <td>{{$p->tipoplanilla}}</td>
                                <td>{{$p->fechaimportado}}</td>
                                <td>{{$p->nombrearchivo}}</td>
                                <td>{{$p->fechaasignado}}</td>
                                <td>{{$p->tipotrabajos}}</td>
                                <td>{{$p->dpto}}</td>
                                <td>{{$p->usuario->name}}</td>
                                
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                        {!!$imp->render()!!}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection