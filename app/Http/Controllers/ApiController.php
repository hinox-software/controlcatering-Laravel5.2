<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Session;
use Auth;

class ApiController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getmotivos($idestado,$idarea)
    {
        
        if ($idarea==config('constants.areasnumero.COORDINACION')) 
            { return response()->json(config('constants.motivo.'.$idestado)); } 
        if ($idarea==config('constants.areasnumero.CENTRALIZACION')) 
            { return response()->json(config('constants.motivoCentralizacion.'.$idestado)); } 
        if ($idarea==config('constants.areasnumero.DIGITACION')) 
            { return response()->json(config('constants.motivoDigitacion.'.$idestado)); } 
        return false;

        
        //return config('constants.motivo.REGISTRADO');
    }

    public function setdptoseleccionado(Request $request)
    {
        Session::put('dptoseleccionado',$request['dptosession']);
         
        return Redirect::to('/home');

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
}
