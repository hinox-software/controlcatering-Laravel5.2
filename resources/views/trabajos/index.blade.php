@extends('layouts.app')

@section('htmlheader_title')
    Trabajos X Area
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (Session::has('message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message')}}
                </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"> 

                        <i class="fa fa-user-plus"></i> 
                        <b>Trabajos:</b> {{ Config::get('constants.tipotrabajo.'.$tipotrabajo) }} <b>- Area:</b> {{ Config::get('constants.areas.'.$area) }} <b>- Dpto:</b> {{ Session::get('dptoseleccionado') }}
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
                                <th></th>
                                <th>ID</th>
                                <th></th>
                                <th>Codigo</th>
                                <th>Nombre Cliente</th>
                                <th class='text-center'>OT</th>
                                <th>Tipo</th>
                                <th>Poblacion</th>
                                <th>Direccion</th>
                                <th class='text-center'>Serv</th>
                                @if (config('constants.areasnumero.COORDINACION')==$area)
                                <th class='text-center'>On-Line</th>
                                @endif
                                <th class='text-center'>Estado</th>
                                @if (config('constants.areasnumero.CENTRALIZACION')==$area)
                                <th>Zona</th>
                                <th>Tecnico</th>
                                <th>Hra</th>
                                @endif
                                

                                <th>Comandos</th>
                                
                            </thead>
                            @foreach ($tra as $p)
                            <tbody>
                                <td>
                                    @if (config('constants.tipotrabajonumero.INSTALACION')==$tipotrabajo)
                                        <i class="fa fa-user-plus" title="{{config('constants.tipotrabajo.'.$tipotrabajo)}}"></i>
                                    @endif
                                    @if (config('constants.tipotrabajonumero.RETIROS_SOLICITADOS')==$tipotrabajo)
                                        <i class="fa fa-user-times" title="{{config('constants.tipotrabajo.'.$tipotrabajo)}}"></i>
                                    @endif
                                    @if (config('constants.tipotrabajonumero.RETIROS_GENERADOS')==$tipotrabajo)
                                        <i class="fa fa-user-times text-yellow" title="{{config('constants.tipotrabajo.'.$tipotrabajo)}}"></i>
                                    @endif
                                    @if (config('constants.tipotrabajonumero.ASISTENCIAS')==$tipotrabajo)
                                        <i class="fa fa-ambulance" title="{{config('constants.tipotrabajo.'.$tipotrabajo)}}"></i>
                                    @endif

                                </td>
                                <td>{{$p->id}}</td>
                                <td>
                                     @if ($p->origen=="M")
                                        <i class="fa fa-newspaper-o text-yellow" title="Registro Manual"></i>
                                     @endif 
                                     @if ($p->origen=="P")
                                        <i class="fa fa-download text-yellow" title="Registro Automatico"></i>
                                     @endif 

                                </td>
                                <td>{{$p->codigocliente}}</td>
                                <td>{{$p->nombrecliente}}</td>
                                <td>{{$p->ot}}</td>
                                <td>{{$p->tipoconfig}}</td>
                                <td>{{$p->poblacion}}</td>
                                <td>{{$p->direccion}}</td>
                                <td class='text-center'>{{$p->tiposervicio}}</td>
                                @if (config('constants.areasnumero.COORDINACION')==$area)
                                <td class='text-center'>                                    
                                        @if ($p->FK_usuarioatiende_id==0)
                                                <i class="fa fa-phone-square text-green" style="font-size: 18px;" title="LIBRE"></i>
                                        @else
                                                <i class="fa fa-phone-square text-red" style="font-size: 18px;" title="{{$p->usuarioatiende->email}}"></i>
                                        @endif                                    
                                    
                                    @if ($p->estado=="ATENDIDO" )
                                            <span class="label label-warning" style="vertical-align:super;font-size: 8px;">{{$p->nroatendido}}</span>
                                    @endif
                                </td>
                                @endif
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
                                @if (config('constants.areasnumero.CENTRALIZACION')==$area)
                                <td class='text-center'>{{$p->zonaasig}}</td>    
                                <td>{{$p->tecnicoasig}}</td>
                                <td>{{$p->horario}}</td>
                                @endif

                                <td>

                                    {!! link_to_route('trabajos.adicionartrabajo', '', $parameters = [$tipotrabajo, $area,$p->id], $attributes = ['class'=>'fa  fa-cogs', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Atender' ]);!!}
                                    {!! link_to_route('trabajos.historialtrabajo', '', $parameters = [$tipotrabajo, $area,$p->id], $attributes = ['class'=>'fa fa-list', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Historial' , 'target'=>'_blank' ]);!!}
                                    {!! link_to_route('reportehistorial', '', $parameters = [$tipotrabajo, $area,$p->id], $attributes = ['class'=>'fa fa-cloud-download', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Generar PDF' , 'target'=>'_blank' ]);!!}

                                </td>
                                <td>
                                    
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                        {!!$tra->render()!!}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection