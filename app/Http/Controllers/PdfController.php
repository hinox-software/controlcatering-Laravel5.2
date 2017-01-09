<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PDF;
use App\Trabajos;
use App\Historial;
use DB;


class PdfController extends Controller
{
    public function historialtrabajos($tipotrabajo, $area, $id) 
    {
       
        $tra= Trabajos::where('id',$id)->get();
        $his= Historial::where('codigocliente', $tra[0]->codigocliente)->orderBy('id', 'desc')->get();
        

        $view =  \View::make('trabajos.historialtrabajo', ['tipotrabajo'=>'100', 'area'=>'0', 'tra'=>$tra[0], 'his'=>$his]);
        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->inline();
        return $pdf->download('historial.pdf'); 
        
        

        

    }
    public function estadoot($tipo, $dpto) 
    {

       
        $tra= Trabajos::where('tipotrabajo1',$tipo)->where('dpto',$dpto)->orderby('tipoplanilla')->orderBy(DB::raw('FIELD(estado, "TERMINADO","EJECUTADO","PENDIENTE","CERRADO","ATENDIDO", "CONFIRMADO", "ASIGNADO", "REGISTRADO")'))->get();
        

        $view =  \View::make('reporte.r_estadoot', ['tra'=>$tra]);
        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->inline();
        return $pdf->setOrientation('landscape')->download('ReportesEstadoOT.pdf'); 
        
        

        

    }
}
