<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Redirect;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Trabajos;
use App\Historial;
use App\Importar;
use Auth;

class ImportarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
      return view('importardatos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // getting all of the post data
      //dd(config('constants.motivo.ATENDIDO.0'));
        $file=$request['archivo'];
        

        

          // sube el archivo al servidor
          if ($file->isValid()) {
              $destinationPath = 'datos'; // upload path
              $extension = $file->getClientOriginalExtension(); // getting image extension
              $fileName = rand(11111,99999).'-'.Carbon::now()->format('d-m-Y').'.'.$extension; // renameing image
              $file->move($destinationPath, $fileName); // uploading file to given path
              $fname=$destinationPath.'/'.$fileName;
                            
              $resul='hola';
              

              $data = Excel::load($fname, function($reader) {})->get();
              //dd($data[0][1]['ot']);
               //dd($data[0][1]['fecha_generacion']->format('Y/m/d H:i:s'));
              $con=count($data[0]);
              //dd($con);
              if(!empty($data[0])) {
                
                  $i=0;
                  $bandera=1;
                  $totalreg=0;
                  //dd($data[0][1]['constants.areas.COORDINACION']);
                  //dd(config('constants.zonas.S/Z'));
                  //nroplanillacargada=

                  $fechaimportadoasignado=Carbon::createFromFormat('d/m/Y', $request['fechaimportado'])->format('Y-m-d');
                  $tipoplanilla=Importar::where('fechaasignado',$fechaimportadoasignado)->get();
                  $nomplanilla='';
                  if ($tipoplanilla->count()>0)
                    { $nomplanilla='RPLZO-'.$tipoplanilla->count();}
                  else
                    { $nomplanilla='PRINCIPAL';}
                  
                  //dd($fechaimportadoasignado);
                  $dpto=$request['dpto'];
                  $OTsinImportar='';
                  $OTok='';


                  while (($i <= $con-1) && ($bandera==1)) {
                    if ($data[0][$i]['codigo']!== "") {

                      if (!empty($data[0][$i]['codigo'])){
                      
                      if (Trabajos::where('codigocliente',$data[0][$i]['codigo'])->where('ot', $data[0][$i]['ot'])->count()>0){
                        $OTsinImportar=$OTsinImportar.'-'.$data[0][$i]['ot'];

                      }
                      else
                       {
                        $totalreg=$totalreg+1;

                        //validaciones de los campos

                        $fgeneracion='1980-01-01';
                        if (! empty($data[0][$i]['fecha_generacion_ot']))
                          { $fgeneracion=$data[0][$i]['fecha_generacion_ot']->format('Y-m-d H:i:s');}

                        $ot='0';
                        if (! empty($data[0][$i]['ot']))
                          { $ot=$data[0][$i]['ot'];}



                       Trabajos::create([
                          'codigocliente'     => $data[0][$i]['codigo'],
                          'nombrecliente'     => $data[0][$i]['nombre_del_cliente'],
                          //'fechageneracion'   => $data[0][$i]['fecha_generacion_ot']->format('Y-m-d H:i:s'),
                          'fechageneracion'   => $fgeneracion,
                          'tipoconfig'        => $data[0][$i]['tipo'],
                          'ot'                => $ot,
                          'poblacion'         => $data[0][$i]['poblacion'],
                          'direccion'         => $data[0][$i]['direccion'],
                          'tiposervicio'      => $data[0][$i]['servicio'],
                          'posgeo'            => $data[0][$i]['posicion_geografica'],
                          'altura'            => $data[0][$i]['altura'],
                          'telefono1'         => $data[0][$i]['telefono_1'],
                          'tipotrabajo1'      => $request['tipotrabajos'],
                          'fechaimportado'    => Carbon::now()->format('Y-m-d H:i'),
                          'fechaactualizado'  => Carbon::now()->format('Y-m-d H:i'),
                          'areaactual'        => config('constants.areasnumero.COORDINACION'),
                          'estado'            => config('constants.estadoinicial.REGISTRADO'),
                          'motivo'            => config('constants.motivo.REGISTRADO.0'),
                          'descripcion'       => 'OT cargada al sistema',
                          'zonaasig'          => config('constants.zonas.S/Z'),
                          'tecnicoasig'       => '0',
                          'FK_usuario_id'     => Auth::user()->id,
                          'fechaimportadoasignado'=>$fechaimportadoasignado,
                          'dpto'              => $dpto,
                          'origen'            => 'P',
                          'tipoplanilla'      => $nomplanilla,


                     

                        ]);
                      // registra historial
                      Historial::create([
                          
                        'codigocliente'       =>$data[0][$i]['codigo'],
                        'ot'                  =>$ot,
                        //'tipotrabajo1'        =>$data[0][$i]['tipo_trabajo'],
                        'tipotrabajo1'        =>$request['tipotrabajos'],
                        'fechaimportado'      =>Carbon::now()->format('Y-m-d'),
                        'fechaactualizado'    =>Carbon::now()->format('Y-m-d H:i'),
                        'areaactual'          =>config('constants.areasnumero.REGISTRO'),
                        'estado'              =>config('constants.estadoinicial.REGISTRADO'),
                        'motivo'              =>config('constants.motivo.REGISTRADO.0'),
                        'descripcion'         =>'OT cargada al sistema',
                        'zonaasig'            =>config('constants.zonas.S/Z'),
                        'tecnicoasig'         =>'0',
                        'FK_usuario_id'       =>Auth::user()->id,
                        'horario'             =>'0',
                        'posgeo'              =>$data[0][$i]['posicion_geografica'],
                        'origen'              => 'P',
                          
                        ]);
                        $OTok=$OTok.'-'.$data[0][$i]['ot'];
                      }

                      // fin del historial
                      }
                    else
                    { $bandera=0;}
                    
                    }
                    else
                    { $bandera=0;}

                    $i=$i+1;
                  }
                  

                  // graba un registro en la tabla historial de importados.
                   Importar::create([
                          
                        'fechaimportado'      =>Carbon::now()->format('Y-m-d H:i'),
                        'nombrearchivo'       =>$fileName,
                        'path'                =>$fname,
                        'tipotrabajos'        =>$request['tipotrabajos'],
                        'fechaasignado'       =>$request['fechaimportado'],
                        'FK_usuario_id'       =>Auth::user()->id,
                        'dpto'                =>$dpto,
                        'tipoplanilla'        =>$nomplanilla,
                          
                        ]);
                  // fin de guardar en tabla importados

                  Session::flash('message', 'TIPO PLANILLA='.$nomplanilla.' --- RESUMEN='.$totalreg.' OT Importadas OK ('.$OTok.') -- OT Ya Existen ERROR='.$OTsinImportar); 
              return Redirect::to('importar');



                } 
                else
                {
                  Session::flash('message', 'Error..Archivo no Compatible/Sin Datos'); 
              return Redirect::to('importar');
                }

            }
            else {
              // sending back with error message.
              Session::flash('message', 'Error..Intentar nuevamente');
              return Redirect::to('importar');
            }
          
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function historial()
    {
        
        $imp= Importar::paginate(20);
        return view('importardatos.historial', compact('imp'));
      
    }
}
