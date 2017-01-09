@extends('layouts.appsinmenu')

@section('htmlheader_title')
    Reportes OT Estados
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-xs-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading"> <i class="fa fa-file-text-o"></i> Reportes de OT Realizados.
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ Auth::user()->name}}
                        </div>
                    </div>

                    <div class="panel-body">
                       <div class="row">

                        <div >
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>F-Asig</th>
                                <th>ID</th>
                                <th>Tipo Planilla</th>
                                <th>Codigo</th>
                                <th>Nombre Cliente</th>
                                <th>OT</th>
                                <th>Tipo</th>
                                <th>Serv</th>
                                <th>Poblacion</th>
                                <th>Ultima Act</th>
                                <th>Estado</th>
                                <th>Motivo</th>
                                <th>Descripcion</th>
                                <th></th>
                                
                                
                                
                            </thead>
                            @foreach ($tra as $p)
                            <tbody>
                                <td>{{$p->fechaimportadoasignado}}</td>
                                <td>{{$p->id}}</td>
                                <td>{{$p->tipoplanilla}}</td>
                                <td>{{$p->codigocliente}}</td>
                                <td>{{$p->nombrecliente}}</td>
                                <td>{{$p->ot}}</td>
                                <td>{{$p->tipoconfig}}</td>
                                <td>{{$p->tiposervicio}}</td>
                                <td>{{$p->poblacion}}</td>
                                <td>{{$p->fechaactualizado}}</td>
                                <td>
                                    @if ($p->estado=="REGISTRADO" )
                                        <span class="label label-danger">{{$p->estado}}</span>
                                    @elseif ($p->estado=="ATENDIDO" or $p->estado=="CONFIRMADO" or $p->estado=="ASIGNADO" or $p->estado=="PENDIENTE")
                                        <span class="label label-warning">{{$p->estado}}</span>
                                    @elseif ($p->estado=="EJECUTADO" or $p->estado=="TERMINADO" or $p->estado=="NO_CERRADO" )
                                        <span class="label label-success" >{{$p->estado}}</span>
                                    @elseif ($p->estado=="CERRADO" ) 
                                        <span class="label label-info">{{$p->estado}}</span>
                                    @endif

                                </td>
                                <td>{{$p->motivo}}</td>
                                <td>{{$p->descripcion}}</td>
                               
                            </tbody>
                            @endforeach
                        </table>
                        
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection