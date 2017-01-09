<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TrabajosRequest;
use App\Trabajos;
use App\Tecnicos;
use App\Historial;
use App\TrabajosCerrados;
use App\HistorialCerrados;
use App\Zonas;
use Redirect;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
use Charts;
use App\User;


class TrabajosController extends Controller
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
        $tra= Trabajos::paginate(30);

        return view('trabajos.index', compact('tra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajos.registroot');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajosRequest $request)
    {
        //$dia=Carbon::now()->format('Y-m-d H:i');

        //dd(Auth::user()->id);
        Trabajos::create([
                          'codigocliente'     => $request['codigocliente'],
                          'nombrecliente'     => $request['nombre'],
                          'fechageneracion'   => Carbon::createFromFormat('d/m/Y', $request['fechageneracion'])->format('Y-m-d'),
                          'tipoconfig'        => $request['tipo'],
                          'ot'                => $request['ot'],
                          'poblacion'         => $request['poblacion'],
                          'direccion'         => $request['direccion'],
                          'tiposervicio'      => $request['servicio'],
                          'posgeo'            => $request['posgeo'],
                          'altura'            => $request['altura'],
                          'telefono1'         => $request['telefono1'],
                          'tipotrabajo1'      => $request['tipotrabajos'],
                          'fechaimportado'    => Carbon::now()->format('Y-m-d H:i'),
                          'fechaactualizado'  => Carbon::now()->format('Y-m-d H:i'),
                          'areaactual'        => config('constants.areasnumero.COORDINACION'),
                          'estado'            => config('constants.estadoinicial.REGISTRADO'),
                          'motivo'            => config('constants.motivo.REGISTRADO.0'),
                          'descripcion'       => 'OT cargada manualmente',
                          'zonaasig'          => config('constants.zonas.S/Z'),
                          'tecnicoasig'       => '0',
                          'FK_usuario_id'     => Auth::user()->id,
                          'fechaimportadoasignado'=>Carbon::createFromFormat('d/m/Y', $request['fechageneracion'])->format('Y-m-d'),
                          'dpto'              => $request['dpto'],
                          'origen'            => 'M',
                        ]);

        Session::flash('message','OT Regitrada ');
        return view('trabajos.registroot');
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

    public function mostrartrabajos($tipotrabajo, $area)
    {

        if ($area==config('constants.areasnumero.COORDINACION')) 
            { $tra= Trabajos::where('areaactual',$area)->where('tipotrabajo1',$tipotrabajo)->wherein('estado',['REGISTRADO','ATENDIDO'])->where('dpto',Session::get('dptoseleccionado'))->paginate(20);}

        if ($area==config('constants.areasnumero.CENTRALIZACION')) 
            { $tra= Trabajos::where('areaactual',$area)->where('tipotrabajo1',$tipotrabajo)->wherein('estado',['CONFIRMADO','ASIGNADO', 'PENDIENTE'])->where('dpto',Session::get('dptoseleccionado'))->orderby(DB::raw('FIELD(estado, "CONFIRMADO", "ASIGNADO", "PENDIENTE")'))->orderby('zonaasig', 'asc')->orderby('tecnicoasig', 'asc')->orderby(DB::raw('FIELD(horario, "M1", "M2", "MD", "T1", "T2", "N1", "TD", "DD", "DF")'))->paginate(20);}

        if ($area==config('constants.areasnumero.DIGITACION')) 
            { $tra= Trabajos::where('areaactual',$area)->where('tipotrabajo1',$tipotrabajo)->wherein('estado',['EJECUTADO','NO_CERRADO'])->where('dpto',Session::get('dptoseleccionado'))->orderby(DB::raw('FIELD(estado, "EJECUTADO", "NO_CERRADO")'))->paginate(20);}



        return view('trabajos.index', ['tra'=>$tra, 'tipotrabajo'=>$tipotrabajo, 'area'=>$area]);
    }

    public function adicionartrabajo($tipotrabajo, $area, $id)
    {
        $tra= Trabajos::where('id',$id)->get();
        if ($area==config('constants.areasnumero.COORDINACION')) {
          if ($tra[0]->FK_usuarioatiende_id<>0 and $tra[0]->FK_usuarioatiende_id<>Auth::user()->id ){
            Session::flash('message','OT esta siendo atendida por: '. $tra[0]->usuarioatiende->name);
            return Redirect::back();

          }else{
            $tra[0]->fill(['FK_usuarioatiende_id'    =>Auth::user()->id, ]);
            $tra[0]->save();

          }
        }
        
        $his= Historial::where('codigocliente', $tra[0]->codigocliente)->orderBy('id', 'desc')->get();
        $zona= Zonas::where('dpto', Session::get('dptoseleccionado'))->orderBy('descripcion')->lists('descripcion', 'descripcion');
        $tecnicos = Tecnicos::orderby('nombre', 'ASC')->lists('nombre', 'nombre');

        
        return view('trabajos.adicionartrabajo', ['tipotrabajo'=>$tipotrabajo, 'area'=>$area, 'tra'=>$tra[0], 'his'=>$his, 'tecnicos'=>$tecnicos, 'zona'=>$zona]);
    }
    public function historialtrabajo($tipotrabajo, $area, $id)
    {
        $tra= Trabajos::where('id',$id)->get();
        $his= Historial::where('codigocliente', $tra[0]->codigocliente)->orderBy('id', 'desc')->get();

        
        return view('trabajos.historialtrabajo', ['tipotrabajo'=>$tipotrabajo, 'area'=>$area, 'tra'=>$tra[0], 'his'=>$his]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        dd('Actualizar trabajo'.$id);//
        
    }

    

    private function workflow($estado, $area)
    {
        // dado un estado retorna el area que le corresponde.
        // AREA COORDINACION

        if (($estado==config('constants.estadoCoordinacion.CONFIRMADO')) and ($area==config('constants.areasnumero.COORDINACION')))
        {
            return config('constants.areasnumero.CENTRALIZACION');
        }
        if (($estado==config('constants.estadoCoordinacion.ATENDIDO')) and ($area==config('constants.areasnumero.COORDINACION')))
        {
            return config('constants.areasnumero.COORDINACION');
        }
        if (($estado==config('constants.estadoCoordinacion.CERRADO')) and ($area==config('constants.areasnumero.COORDINACION')))
        {
            return config('constants.areasnumero.COORDINACION');
        }

        // AREA CENTRALIZACION
        
        if (($estado==config('constants.estadoCentralizacion.ASIGNADO')) and ($area==config('constants.areasnumero.CENTRALIZACION')))
        {
            return config('constants.areasnumero.CENTRALIZACION');
        }
        if (($estado==config('constants.estadoCentralizacion.PENDIENTE')) and ($area==config('constants.areasnumero.CENTRALIZACION')))
        {
            return config('constants.areasnumero.CENTRALIZACION');
        }
        if (($estado==config('constants.estadoCentralizacion.EJECUTADO')) and ($area==config('constants.areasnumero.CENTRALIZACION')))
        {
            return config('constants.areasnumero.DIGITACION');
        }
        if (($estado==config('constants.estadoCentralizacion.CERRADO')) and ($area==config('constants.areasnumero.CENTRALIZACION')))
        {
            return config('constants.areasnumero.CENTRALIZACION');
        }
        // AREA DIGITACION
        
        if (($estado==config('constants.estadoDigitacion.NO_CERRADO')) and ($area==config('constants.areasnumero.DIGITACION')))
        {
            return config('constants.areasnumero.DIGITACION');
        }
        if (($estado==config('constants.estadoDigitacion.TERMINADO')) and ($area==config('constants.areasnumero.DIGITACION')))
        {
            return config('constants.areasnumero.DIGITACION');
        }
        


        return '-1';

    }


    public function updatetrabajos(Request $request, $id, $tipotrabajo, $area)
    {
        
        
        $newarea=$this->workflow($request['estado_id'],$area);
        if ($newarea=="-1") {
            dd("Revisar el Codigio WorkFlow");
        } else {
            
         $tra= Trabajos::find($id);

         if ($request['zona_id']==null) { $zona='S/Z'; } else { $zona=$request['zona_id'];}
         if ($request['tecnico_id']==null) { $tecnico='S/Tecnico'; } else { $tecnico=$request['tecnico_id'];}

         $motivo='ErrorMotivo';

         if ($area==config('constants.areasnumero.COORDINACION')) 
            { $motivo=config('constants.motivo.'.$request['estado_id'].'.'.$request['motivo_id']); } 
        if ($area==config('constants.areasnumero.CENTRALIZACION')) 
            { $motivo=config('constants.motivoCentralizacion.'.$request['estado_id'].'.'.$request['motivo_id']); } 
        if ($area==config('constants.areasnumero.DIGITACION')) 
            { $motivo=config('constants.motivoDigitacion.'.$request['estado_id'].'.'.$request['motivo_id']); } 
         
         //contador para el nro de estados atendidos
          $nroatendido=$tra->nroatendido;
          if ($request['estado_id']=='ATENDIDO')
          { $nroatendido=$nroatendido+1;}

        // fin del contador
        



        $tra->fill([
            'posgeo'           =>$request['posgeo'],
            'fechaactualizado' =>Carbon::now()->format('Y-m-d H:i'),
            'estado'           =>$request['estado_id'],
            'motivo'           =>$motivo,
            'descripcion'      =>$request['descripcion_id'],
            'areaactual'       =>$newarea,
            'zonaasig'         =>$zona,
            'tecnicoasig'      =>$tecnico,
            'FK_usuario_id'    =>Auth::user()->id,
            'horario'          =>$request['horario_id'],
            'FK_usuarioatiende_id'  =>0,            
            'nroatendido'      =>$nroatendido,
            ]);
        $tra->save();

        // registra historial
        Historial::create([
                          
                        'codigocliente'       =>$tra->codigocliente,
                        'ot'                  =>$tra->ot,
                        'tipotrabajo1'        =>$tra->tipotrabajo1,
                        'fechaimportado'      =>$tra->fechaimportado,
                        'fechaactualizado'    =>$tra->fechaactualizado,
                        'areaactual'          =>$area,
                        'estado'              =>$tra->estado,
                        'motivo'              =>$tra->motivo,
                        'descripcion'         =>$tra->descripcion,
                        'zonaasig'            =>$tra->zonaasig,
                        'tecnicoasig'         =>$tra->tecnicoasig,
                        'FK_usuario_id'       =>$tra->FK_usuario_id,
                        'horario'             =>$tra->horario,
                        'posgeo'              =>$tra->posgeo,
                          
                        ]);

        // fin del historial
                
        Session::flash('message','OT Actualizada : '.$tra->ot);
        
        return Redirect::route('trabajos.mostrartrabajos', array('tipotrabajo' => $tipotrabajo, 'area' => $area));
        }
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
    public function repcerrados()
    { 
        return view('trabajos.repcerrados');
    }
    public function generadoscerrados(Request $request)
    { 
      $tipo=$request['tipotrabajo'];
      $dpto=$request['dpto'];
        $tra= Trabajos::where('tipotrabajo1',$tipo)->where('dpto',$dpto)->orderby('tipoplanilla')->orderBy(DB::raw('FIELD(estado, "TERMINADO","EJECUTADO","NO_CERRADO","CERRADO","PENDIENTE","ATENDIDO", "CONFIRMADO", "ASIGNADO", "REGISTRADO")'))->get();
        //return view('trabajos.index', compact('tra'));
        
        return view('trabajos.generadocerrados', [ 'tra'=>$tra, 'tipo'=>$tipo, 'dpto'=>$dpto]);
    }
    public function cerrarjornada()
    { 
        return view('trabajos.cerrarjornada');
    }
    public function ejecutacerrarjornada(Request $request)
    { 
        //dd(Carbon::now()->format('Y-m-d'));
      //dd(Carbon::createFromFormat('d/m/Y', $request['fechacerrarjornada'])->format('Y-m-d'));
      //$dia=Carbon::parse('2016-12-24'); 
      $dia=Carbon::createFromFormat('d/m/Y', $request['fechacerrarjornada'])->format('Y-m-d'); 
      //$dia=Carbon::today()->toDateString();
      $tipo=$request['tipotrabajo']; 
      $dpto=$request['dpto'];
      $fechagraba=Carbon::now()->format('Y-m-d H:i');
      // migra todo lo que es de esa fecha.
      $tra=Trabajos::where('tipotrabajo1',$tipo)->where('dpto',$dpto)->whereDate('fechaimportadoasignado', '=', $dia )->get();
      $i=0;
      //dd($tra);
      

      foreach ($tra as $t){

        
        TrabajosCerrados::create([
                          'id'                => $t->id,
                          'codigocliente'     => $t->codigocliente,
                          'nombrecliente'     => $t->nombrecliente,
                          'fechageneracion'   => $t->fechageneracion,
                          'tipoconfig'        => $t->tipoconfig,
                          'ot'                => $t->ot,
                          'poblacion'         => $t->poblacion,
                          'direccion'         => $t->direccion,
                          'tiposervicio'      => $t->tiposervicio,
                          'posgeo'            => $t->posgeo,
                          'altura'            => $t->altura,
                          'telefono1'         => $t->telefono1,
                          'tipotrabajo1'      => $t->tipotrabajo1,
                          'fechaimportado'    => $t->fechaimportado,
                          'fechaactualizado'  => $t->fechaactualizado,
                          'areaactual'        => $t->areaactual,
                          'estado'            => $t->estado,
                          'motivo'            => $t->motivo,
                          'descripcion'       => $t->descripcion,
                          'zonaasig'          => $t->zonaasig,
                          'tecnicoasig'       => $t->tecnicoasig,
                          'FK_usuario_id'     => $t->FK_usuario_id,
                          'horario'           => $t->horario,
                          'fechaimportadoasignado'=>$t->fechaimportadoasignado,
                          'descripcionimportadoasignado'=>$t->descripcionimportadoasignado,
                          'dpto'              => $t->dpto,
                          'origen'            => $t->origen,
                          'usuariocerrados'   =>  Auth::user()->id,
                          'fechacerrados'     =>  $fechagraba

                        ]);
        $his= Historial::where('codigocliente', $t->codigocliente)->where('ot', $t->ot)->orderBy('id', 'asc')->get();
        foreach ($his as $h){
          HistorialCerrados::create([
                          
                        'id'                  =>$h->id,
                        'codigocliente'       =>$h->codigocliente,
                        'ot'                  =>$h->ot,
                        'tipotrabajo1'        =>$h->tipotrabajo1,
                        'fechaimportado'      =>$h->fechaimportado,
                        'fechaactualizado'    =>$h->fechaactualizado,
                        'areaactual'          =>$h->areaactual,
                        'estado'              =>$h->estado,
                        'motivo'              =>$h->motivo,
                        'descripcion'         =>$h->descripcion,
                        'zonaasig'            =>$h->zonaasig,
                        'tecnicoasig'         =>$h->tecnicoasig,
                        'FK_usuario_id'       =>$h->FK_usuario_id,
                        'horario'             =>$h->horario,
                        'posgeo'              =>$h->posgeo,
                        ]);
        }
        Historial::where('codigocliente', $t->codigocliente)->where('ot', $t->ot)->orderBy('id', 'asc')->delete();
       
          $i=$i+1; 
      }
      Trabajos::where('tipotrabajo1',$tipo)->where('dpto',$dpto)->whereDate('fechaimportadoasignado', '=', $dia )->delete();
      // fin de la migracion segu la fecha




      // migra todo lo que es de esa fecha.
      $tra1=Trabajos::where('tipotrabajo1',$tipo)->where('dpto',$dpto)->where('estado',config('constants.estadoDigitacion.TERMINADO'))->get();
      $j=0;
      //dd($tra);
      

      foreach ($tra1 as $t1){

        
        TrabajosCerrados::create([
                          'id'                => $t1->id,
                          'codigocliente'     => $t1->codigocliente,
                          'nombrecliente'     => $t1->nombrecliente,
                          'fechageneracion'   => $t1->fechageneracion,
                          'tipoconfig'        => $t1->tipoconfig,
                          'ot'                => $t1->ot,
                          'poblacion'         => $t1->poblacion,
                          'direccion'         => $t1->direccion,
                          'tiposervicio'      => $t1->tiposervicio,
                          'posgeo'            => $t1->posgeo,
                          'altura'            => $t1->altura,
                          'telefono1'         => $t1->telefono1,
                          'tipotrabajo1'      => $t1->tipotrabajo1,
                          'fechaimportado'    => $t1->fechaimportado,
                          'fechaactualizado'  => $t1->fechaactualizado,
                          'areaactual'        => $t1->areaactual,
                          'estado'            => $t1->estado,
                          'motivo'            => $t1->motivo,
                          'descripcion'       => $t1->descripcion,
                          'zonaasig'          => $t1->zonaasig,
                          'tecnicoasig'       => $t1->tecnicoasig,
                          'FK_usuario_id'     => $t1->FK_usuario_id,
                          'horario'           => $t1->horario,
                          'fechaimportadoasignado'=>$t1->fechaimportadoasignado,
                          'descripcionimportadoasignado'=>$t1->descripcionimportadoasignado,
                          'dpto'              => $t1->dpto,
                          'origen'            => $t1->origen,
                          'usuariocerrados'   =>  Auth::user()->id,
                          'fechacerrados'     =>  $fechagraba

                        ]);
        $his= Historial::where('codigocliente', $t1->codigocliente)->where('ot', $t1->ot)->orderBy('id', 'asc')->get();
        foreach ($his as $h){
          HistorialCerrados::create([
                          
                        'id'                  =>$h->id,
                        'codigocliente'       =>$h->codigocliente,
                        'ot'                  =>$h->ot,
                        'tipotrabajo1'        =>$h->tipotrabajo1,
                        'fechaimportado'      =>$h->fechaimportado,
                        'fechaactualizado'    =>$h->fechaactualizado,
                        'areaactual'          =>$h->areaactual,
                        'estado'              =>$h->estado,
                        'motivo'              =>$h->motivo,
                        'descripcion'         =>$h->descripcion,
                        'zonaasig'            =>$h->zonaasig,
                        'tecnicoasig'         =>$h->tecnicoasig,
                        'FK_usuario_id'       =>$h->FK_usuario_id,
                        'horario'             =>$h->horario,
                        'posgeo'              =>$h->posgeo,
                        ]);
        }
        Historial::where('codigocliente', $t1->codigocliente)->where('ot', $t1->ot)->orderBy('id', 'asc')->delete();
       
          $j=$j+1; 
      }
      Trabajos::where('tipotrabajo1',$tipo)->where('dpto',$dpto)->where('estado',config('constants.estadoDigitacion.TERMINADO'))->delete();
      // fin de la migracion segu la fecha


        Session::flash('message','Trabajos X Jornada : '.$i);

        Session::flash('message1','Trabajos Terminados : '.$j);
        //return view('trabajos.cerrarjornada');
        return Redirect::route('trabajos.cerrarjornada');
    }
    public function otxoperadordiario(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=User::join('historial', 'users.id', '=', 'historial.FK_usuario_id')
      ->whereIn('historial.estado', array('ATENDIDO', 'CONFIRMADO', 'CERRADO'))
      ->where('historial.areaactual','=', '0')   
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->groupBy('users.id')
      ->orderby('nro', 'desc')
      ->get(['users.id','users.name', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    $ValuesY2=[];
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['id'],$l['name']);

       // Estado ATENDIDO
      $valatendido=0;
      $Lista0=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'ATENDIDO')
      ->where('areaactual','=', '0')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista0->count()>0){$valatendido=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['id'],$valatendido);

      // Estado CONFIRMADO
      $valconfirmado=0;
      $Lista1=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'CONFIRMADO')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->where('areaactual','=', '0')
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['id'],$valconfirmado);

      // Estado CERRADO
      $valcerrado=0;
      $Lista2=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'CERRADO')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->where('areaactual','=', '0')
      ->get(); 
      if ($Lista2->count()>0){$valcerrado=$Lista2->count();}

      $ValuesY2=array_add($ValuesY2, $l['id'],$valcerrado);
    

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('OTs por Operador/Dia - AREA: COORDINACION')
    ->colors(['#f39c12', '#52be80', '#aed6f1'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('ATENDIDO', $ValuesY0)
    ->dataset('CONFIRMADO', $ValuesY1)
    ->dataset('CERRADO', $ValuesY2)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }

    public function otxoperadorplanilla(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=User::join('historial', 'users.id', '=', 'historial.FK_usuario_id')
      ->whereIn('historial.estado', array('ATENDIDO', 'CONFIRMADO', 'CERRADO'))
      ->where('historial.areaactual','=', '0')   
      // activo
      ->groupBy('users.id')
      ->orderby('nro', 'desc')
      ->get(['users.id','users.name', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    $ValuesY2=[];
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['id'],$l['name']);

       // Estado ATENDIDO
      $valatendido=0;
      $Lista0=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'ATENDIDO')
      ->where('areaactual','=', '0')
      //activo
      ->get(); 
      if ($Lista0->count()>0){$valatendido=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['id'],$valatendido);

      // Estado CONFIRMADO
      $valconfirmado=0;
      $Lista1=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'CONFIRMADO')
      //activo
      ->where('areaactual','=', '0')
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['id'],$valconfirmado);

      // Estado CERRADO
      $valcerrado=0;
      $Lista2=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'CERRADO')
      //activo
      ->where('areaactual','=', '0')
      ->get(); 
      if ($Lista2->count()>0){$valcerrado=$Lista2->count();}

      $ValuesY2=array_add($ValuesY2, $l['id'],$valcerrado);
    

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('OTs por Operador/Planilla - AREA: COORDINACION')
    ->colors(['#f39c12', '#52be80', '#aed6f1'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('ATENDIDO', $ValuesY0)
    ->dataset('CONFIRMADO', $ValuesY1)
    ->dataset('CERRADO', $ValuesY2)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }

    public function otxoperadordiariocentral(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=User::join('historial', 'users.id', '=', 'historial.FK_usuario_id')
      ->whereIn('historial.estado', array('ASIGNADO', 'EJECUTADO', 'CERRADO', 'PENDIENTE'))
      ->where('historial.areaactual','=', '1')   
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->groupBy('users.id')
      ->orderby('nro', 'desc')
      ->get(['users.id','users.name', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    $ValuesY2=[];
    $ValuesY3=[];
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['id'],$l['name']);

       // Estado ATENDIDO
      $valatendido=0;
      $Lista0=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'ASIGNADO')
      ->where('areaactual','=', '1')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista0->count()>0){$valatendido=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['id'],$valatendido);

      // Estado CONFIRMADO
      $valconfirmado=0;
      $Lista1=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'EJECUTADO')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->where('areaactual','=', '1')
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['id'],$valconfirmado);

      // Estado CERRADO
      $valcerrado=0;
      $Lista2=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'CERRADO')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->where('areaactual','=', '1')
      ->get(); 
      if ($Lista2->count()>0){$valcerrado=$Lista2->count();}

      $ValuesY2=array_add($ValuesY2, $l['id'],$valcerrado);

      // Estado PENDIENTE
      $valpendiente=0;
      $Lista3=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'PENDIENTE')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->where('areaactual','=', '1')
      ->get(); 
      if ($Lista3->count()>0){$valpendiente=$Lista3->count();}

      $ValuesY3=array_add($ValuesY3, $l['id'],$valpendiente);
    

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('OTs por Operador/Dia - AREA: CENTRALIZACION')
    ->colors(['#f39c12', '#52be80', '#aed6f1', '#aed6f1'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('ASIGNADO', $ValuesY0)
    ->dataset('EJECUTADO', $ValuesY1)
    ->dataset('CERRADO', $ValuesY2)
    ->dataset('PENDIENTE', $ValuesY3)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }


    public function otxoperadorplanillacentral(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=User::join('historial', 'users.id', '=', 'historial.FK_usuario_id')
      ->whereIn('historial.estado', array('ASIGNADO', 'EJECUTADO', 'CERRADO', 'PENDIENTE'))
      ->where('historial.areaactual','=', '1')   
      ->groupBy('users.id')
      ->orderby('nro', 'desc')
      ->get(['users.id','users.name', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    $ValuesY2=[];
    $ValuesY3=[];
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['id'],$l['name']);

       // Estado ATENDIDO
      $valatendido=0;
      $Lista0=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'ASIGNADO')
      ->where('areaactual','=', '1')
      ->get(); 
      if ($Lista0->count()>0){$valatendido=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['id'],$valatendido);

      // Estado CONFIRMADO
      $valconfirmado=0;
      $Lista1=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'EJECUTADO')
      ->where('areaactual','=', '1')
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['id'],$valconfirmado);

      // Estado CERRADO
      $valcerrado=0;
      $Lista2=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'CERRADO')
      ->where('areaactual','=', '1')
      ->get(); 
      if ($Lista2->count()>0){$valcerrado=$Lista2->count();}

      $ValuesY2=array_add($ValuesY2, $l['id'],$valcerrado);

      // Estado PENDIENTE
      $valpendiente=0;
      $Lista3=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'PENDIENTE')
      ->where('areaactual','=', '1')
      ->get(); 
      if ($Lista3->count()>0){$valpendiente=$Lista3->count();}

      $ValuesY3=array_add($ValuesY3, $l['id'],$valpendiente);
    

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('OTs por Operador/Dia - AREA: CENTRALIZACION')
    ->colors(['#f39c12', '#52be80', '#aed6f1', '#aed6f1'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('ASIGNADO', $ValuesY0)
    ->dataset('EJECUTADO', $ValuesY1)
    ->dataset('CERRADO', $ValuesY2)
    ->dataset('PENDIENTE', $ValuesY3)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }


    public function otxoperadordiariodigitacion(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=User::join('historial', 'users.id', '=', 'historial.FK_usuario_id')
      ->whereIn('historial.estado', array('TERMINADO', 'NO_CERRADO'))
      ->where('historial.areaactual','=', '2')   
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->groupBy('users.id')
      ->orderby('nro', 'desc')
      ->get(['users.id','users.name', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['id'],$l['name']);

       // Estado TERMINADO
      $valatendido=0;
      $Lista0=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'TERMINADO')
      ->where('areaactual','=', '2')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista0->count()>0){$valatendido=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['id'],$valatendido);

      // Estado NO CERRADO
      $valconfirmado=0;
      $Lista1=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'NO_CERRADO')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->where('areaactual','=', '2')
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['id'],$valconfirmado);

      

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('OTs por Operador/Dia - AREA: CENTRALIZACION')
    ->colors(['#f39c12', '#52be80', '#aed6f1', '#aed6f1'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('TERMINADO', $ValuesY0)
    ->dataset('NO_CERRADO', $ValuesY1)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }

    public function otxoperadorplanilladigitacion(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=User::join('historial', 'users.id', '=', 'historial.FK_usuario_id')
      ->whereIn('historial.estado', array('TERMINADO', 'NO_CERRADO'))
      ->where('historial.areaactual','=', '2')   
      ->groupBy('users.id')
      ->orderby('nro', 'desc')
      ->get(['users.id','users.name', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['id'],$l['name']);

       // Estado TERMINADO
      $valatendido=0;
      $Lista0=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'TERMINADO')
      ->where('areaactual','=', '2')
      ->get(); 
      if ($Lista0->count()>0){$valatendido=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['id'],$valatendido);

      // Estado NO CERRADO
      $valconfirmado=0;
      $Lista1=Historial::where('FK_usuario_id','=',$l['id'])
      ->where('estado','=', 'NO_CERRADO')
      ->where('areaactual','=', '2')
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['id'],$valconfirmado);

      

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('OTs por Operador/Dia - AREA: CENTRALIZACION')
    ->colors(['#f39c12', '#52be80', '#aed6f1', '#aed6f1'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('TERMINADO', $ValuesY0)
    ->dataset('NO_CERRADO', $ValuesY1)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }


    public function otxdiarioxtipotrabajo(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=Historial::whereIn('historial.estado', array('REGISTRADO','ATENDIDO','CERRADO','CONFIRMADO','ASIGNADO','EJECUTADO','PENDIENTE','TERMINADO', 'NO_CERRADO'))
      ->where('historial.tipotrabajo1','=', '400')   
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->orderby('nro', 'desc')
      ->get(['historial.tipotrabajo1', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    $ValuesY2=[];
    $ValuesY3=[];
    $ValuesY4=[];
    $ValuesY5=[];
    $ValuesY6=[];
    $ValuesY7=[];
    $ValuesY8=[];
    
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['tipotrabajo1'],$l['tipotrabajo1']);

       // Estado REGISTRADO
      $valregistrado=0;
      $Lista0=Historial::where('estado','=', 'REGISTRADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista0->count()>0){$valregistrado=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['tipotrabajo1'],$valregistrado);

      // Estado CONFIRMADO
      $valconfirmado=0;
      $Lista1=Historial::where('estado','=', 'CONFIRMADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['tipotrabajo1'],$valconfirmado);

      // Estado ATENDIDO
      $valatendido=0;
      $Lista2=Historial::where('estado','=', 'ATENDIDO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista2->count()>0){$valatendido=$Lista2->count();}

      $ValuesY2=array_add($ValuesY2, $l['tipotrabajo1'],$valatendido);

      // Estado CERRADO
      $valcerrado=0;
      $Lista3=Historial::where('estado','=', 'CERRADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista3->count()>0){$valcerrado=$Lista3->count();}

      $ValuesY3=array_add($ValuesY3, $l['tipotrabajo1'],$valcerrado);

      // Estado EJECUTADO
      $valejecutado=0;
      $Lista4=Historial::where('estado','=', 'EJECUTADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista4->count()>0){$valejecutado=$Lista4->count();}

      $ValuesY4=array_add($ValuesY4, $l['tipotrabajo1'],$valejecutado);


      // Estado ASIGNADO
      $valasignado=0;
      $Lista5=Historial::where('estado','=', 'ASIGNADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista5->count()>0){$valasignado=$Lista5->count();}

      $ValuesY5=array_add($ValuesY5, $l['tipotrabajo1'],$valasignado);

      // Estado PENDIENTE
      $valpendiente=0;
      $Lista6=Historial::where('estado','=', 'PENDIENTE')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista6->count()>0){$valpendiente=$Lista6->count();}

      $ValuesY6=array_add($ValuesY6, $l['tipotrabajo1'],$valpendiente);

      // Estado TERMINADO
      $valterminado=0;
      $Lista7=Historial::where('estado','=', 'TERMINADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista7->count()>0){$valterminado=$Lista7->count();}

      $ValuesY7=array_add($ValuesY7, $l['tipotrabajo1'],$valterminado);

      // Estado NO CERRADO
      $valnocerrrado=0;
      $Lista8=Historial::where('estado','=', 'NO_CERRADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->whereDate('fechaactualizado', '=', Carbon::today()->toDateString())
      ->get(); 
      if ($Lista8->count()>0){$valnocerrrado=$Lista8->count();}

      $ValuesY8=array_add($ValuesY8, $l['tipotrabajo1'],$valnocerrrado);

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('Trabajos por OTs/Hoy - TRABAJO: RETIROS_GENERADOS')
    ->colors(['#dd4b39','#f39c12', '#f39c12', '#f39c12', '#aed6f1','#aed6f1', '#00a65a', '#00a65a', '#00a65a'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('REGISTRADO', $ValuesY0)
    ->dataset('ATENDIDO', $ValuesY2)
    ->dataset('CONFIRMADO', $ValuesY1)
    ->dataset('ASIGNADO', $ValuesY5)
    ->dataset('CERRADO', $ValuesY3)
    ->dataset('PENDIENTE', $ValuesY6)
    ->dataset('EJECUTADO', $ValuesY4)
    ->dataset('TERMINADO', $ValuesY7)
    ->dataset('NO_CERRADO', $ValuesY8)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }

public function otxplanillaxtipotrabajo(){

      // consulta para los operadores que atendieron las OT en el AREA de Coordinacion.
      // Estado ATENDIDO
     $Lista=Historial::whereIn('historial.estado', array('REGISTRADO','ATENDIDO','CERRADO','CONFIRMADO','ASIGNADO','EJECUTADO','PENDIENTE','TERMINADO', 'NO_CERRADO'))
      ->where('historial.tipotrabajo1','=', '400')   
      ->orderby('nro', 'desc')
      ->get(['historial.tipotrabajo1', DB::raw('count(historial.id) as nro')]); 
    
    $ValuesX=[];
    $ValuesY=[];
    $ValuesY0=[];
    $ValuesY1=[];
    $ValuesY2=[];
    $ValuesY3=[];
    $ValuesY4=[];
    $ValuesY5=[];
    $ValuesY6=[];
    $ValuesY7=[];
    $ValuesY8=[];
    
    foreach ($Lista as $l){
      $ValuesX=array_add($ValuesX, $l['tipotrabajo1'],$l['tipotrabajo1']);

       // Estado REGISTRADO
      $valregistrado=0;
      $Lista0=Historial::where('estado','=', 'REGISTRADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista0->count()>0){$valregistrado=$Lista0->count();}

      $ValuesY0=array_add($ValuesY0, $l['tipotrabajo1'],$valregistrado);

      // Estado CONFIRMADO
      $valconfirmado=0;
      $Lista1=Historial::where('estado','=', 'CONFIRMADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista1->count()>0){$valconfirmado=$Lista1->count();}

      $ValuesY1=array_add($ValuesY1, $l['tipotrabajo1'],$valconfirmado);

      // Estado ATENDIDO
      $valatendido=0;
      $Lista2=Historial::where('estado','=', 'ATENDIDO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista2->count()>0){$valatendido=$Lista2->count();}

      $ValuesY2=array_add($ValuesY2, $l['tipotrabajo1'],$valatendido);

      // Estado CERRADO
      $valcerrado=0;
      $Lista3=Historial::where('estado','=', 'CERRADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista3->count()>0){$valcerrado=$Lista3->count();}

      $ValuesY3=array_add($ValuesY3, $l['tipotrabajo1'],$valcerrado);

      // Estado EJECUTADO
      $valejecutado=0;
      $Lista4=Historial::where('estado','=', 'EJECUTADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista4->count()>0){$valejecutado=$Lista4->count();}

      $ValuesY4=array_add($ValuesY4, $l['tipotrabajo1'],$valejecutado);


      // Estado ASIGNADO
      $valasignado=0;
      $Lista5=Historial::where('estado','=', 'ASIGNADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista5->count()>0){$valasignado=$Lista5->count();}

      $ValuesY5=array_add($ValuesY5, $l['tipotrabajo1'],$valasignado);

      // Estado PENDIENTE
      $valpendiente=0;
      $Lista6=Historial::where('estado','=', 'PENDIENTE')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista6->count()>0){$valpendiente=$Lista6->count();}

      $ValuesY6=array_add($ValuesY6, $l['tipotrabajo1'],$valpendiente);

      // Estado TERMINADO
      $valterminado=0;
      $Lista7=Historial::where('estado','=', 'TERMINADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista7->count()>0){$valterminado=$Lista7->count();}

      $ValuesY7=array_add($ValuesY7, $l['tipotrabajo1'],$valterminado);

      // Estado NO CERRADO
      $valnocerrrado=0;
      $Lista8=Historial::where('estado','=', 'NO_CERRADO')
      ->where('historial.tipotrabajo1','=', '400')
      ->get(); 
      if ($Lista8->count()>0){$valnocerrrado=$Lista8->count();}

      $ValuesY8=array_add($ValuesY8, $l['tipotrabajo1'],$valnocerrrado);

    }
    // fin de consulta 
      

    $chart = Charts::multi('bar', 'highcharts')
    ->title('Trabajos por OTS/Planilla - TRABAJO: RETIROS_GENERADOS')
    ->colors(['#dd4b39','#f39c12', '#f39c12', '#f39c12', '#aed6f1','#aed6f1', '#00a65a', '#00a65a', '#00a65a'])
    ->labels($ValuesX)
    ->elementLabel("Cantidad OTs")
    ->dataset('REGISTRADO', $ValuesY0)
    ->dataset('ATENDIDO', $ValuesY2)
    ->dataset('CONFIRMADO', $ValuesY1)
    ->dataset('ASIGNADO', $ValuesY5)
    ->dataset('CERRADO', $ValuesY3)
    ->dataset('PENDIENTE', $ValuesY6)
    ->dataset('EJECUTADO', $ValuesY4)
    ->dataset('TERMINADO', $ValuesY7)
    ->dataset('NO_CERRADO', $ValuesY8)
    ->dimensions(800,400)
    ->responsive(true);

    return $chart;

    }

    public function misestadisticas()
    { 
      $chartdiario=$this->otxoperadordiario();
      $chartplanilla=$this->otxoperadorplanilla();

        return view('graficos.misestadisticas', ['chartdiario' => $chartdiario, 'chartplanilla' => $chartplanilla]);

    }
    public function misgraficoscentralizacion()
    { 
      $chartdiario=$this->otxoperadordiariocentral();
      $chartplanilla=$this->otxoperadorplanillacentral();

        return view('graficos.misestadisticascentralizacion', ['chartdiario' => $chartdiario, 'chartplanilla' => $chartplanilla]);

    }
    public function misgraficosdigitacion()
    { 
      $chartdiario=$this->otxoperadordiariodigitacion();
      $chartplanilla=$this->otxoperadorplanilladigitacion();

        return view('graficos.misestadisticasdigitacion', ['chartdiario' => $chartdiario, 'chartplanilla' => $chartplanilla]);

    }
    public function producciongeneralgrafico()
    { 
      $chartdiario=$this->otxdiarioxtipotrabajo();
      $chartplanilla=$this->otxplanillaxtipotrabajo();

        return view('graficos.producciongeneralgrafico', ['chartdiario' => $chartdiario, 'chartplanilla' => $chartplanilla]);

    }
    
}
