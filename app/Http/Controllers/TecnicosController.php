<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tecnicos;
use Redirect;
use Carbon\Carbon;
use Session;
use Auth;



class TecnicosController extends Controller
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
        $tec= Tecnicos::paginate(5);
        return view('tecnicos.index', compact('tec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request['empresa']);
         Tecnicos::create([
            'codigo'    => $request['codigo'],
            'nombre'    => $request['nombre'],
            'ci'        => $request['ci'],
            'empresa'   => $request['empresa'],
            'telefono'  => $request['telefono'],
        ]); 


        Session::flash('message','Tecnico Registrado');
        
        return Redirect::to('/tecnicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tec= Tecnicos::find($id);
        return view('tecnicos.edit', compact('tec'));
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
        $tec= Tecnicos::find($id);
        $tec->fill([
            'codigo'    =>$request['codigo'],
            'nombre'    =>$request['nombre'],
            'ci'        =>$request['ci'],
            'empresa'   =>$request['empresa'],
            'telefono'  =>$request['telefono|'],
            
            ]);
        $tec->save();
                
        Session::flash('message','Tecnico Actualizado');
        
          return Redirect::to('/tecnicos');
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
}
