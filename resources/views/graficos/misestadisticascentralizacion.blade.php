@extends('layouts.app')

@section('htmlheader_title')
	Mis Estadisticas
@endsection


@section('main-content')
{!! Charts::assets() !!}

	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <i class="fa fa-bar-chart"></i> 
                        -- PRODUCCION DIARIA  por Operador -- <b>De:</b> {{ Config::get('constants.tipotrabajo.400') }} - <b>Area:</b> {{ Config::get('constants.areas.1') }} 

					</div>

					<div class="panel-body">
						 {!! $chartdiario->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <i class="fa fa-bar-chart"></i> 
                        -- PRODUCCION DIARIA  por Operador -- <b>De:</b> {{ Config::get('constants.tipotrabajo.400') }} - <b>Area:</b> {{ Config::get('constants.areas.1') }} 

					</div>

					<div class="panel-body">
						 {!! $chartplanilla->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection