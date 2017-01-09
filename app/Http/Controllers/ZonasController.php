<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Zonas;
use Redirect;
use Carbon\Carbon;
use Session;
use Auth;

class ZonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $zona= Zonas::orderby('dpto')->orderby('descripcion')->paginate(20);
        return view('zonas.index', compact('zona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('zonas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           Zonas::create([
            'descripcion'    => $request['descripcion'],
            'dpto'        => $request['dpto'],
        ]); 


        Session::flash('message','Zona Registrada');
        
        return Redirect::to('/zonas');
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
        $zona= Zonas::find($id);
        return view('zonas.edit', compact('zona'));
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
         $zona= Zonas::find($id);
        $zona->fill([
            
            'descripcion'    =>$request['descripcion'],
            'dpto'        =>$request['dpto'],
            
            ]);
        $zona->save();
                
        Session::flash('message','Zona Actualizada');
        
        return Redirect::to('/zonas');
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
