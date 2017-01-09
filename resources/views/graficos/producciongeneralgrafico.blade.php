@extends('layouts.app')

@section('htmlheader_title')
	Produccion General
@endsection


@section('main-content')
{!! Charts::assets() !!}

	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <i class="fa fa-bar-chart"></i> 
                        -- PRODUCCION DIARIA -- <b>De:</b> {{ Config::get('constants.tipotrabajo.400') }}  
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
                        -- PRODUCCION PLANILLA -- <b>De:</b> {{ Config::get('constants.tipotrabajo.400') }} 
					</div>
					<div class="panel-body">
						 {!! $chartplanilla->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection