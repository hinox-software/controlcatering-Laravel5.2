<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Session;
use Redirect;

class UserController extends Controller
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
        $usu= User::paginate(5);
        return view('user.index', compact('usu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('user.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //User::create($request->all());
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'tipo' => $request['tipo'],
            'dpto' => $request['dpto'],
            'estado' => $request['estado'],
            'activaInstalacion' => $request['activaInstalacion'],
            'activaRetiro' => $request['activaRetiro'],
            'activaAsitencia' => $request['activaAsitencia'],
            'activaCoordinacion' => $request['activaCoordinacion'],
            'activaCentralizacion' => $request['activaCentralizacion'],
            'activaDigitacion' => $request['activaDigitacion'],
        ]);
        Session::flash('message','Usuario Registrado');
        
        return Redirect::to('/user');
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
        
        $usu = User::find($id);
        return view('user.edit', ['usu'=>$usu]);
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
        $usu= User::find($id);
        $usu->fill([
            'name' =>$request['name'],
            'password' => bcrypt($request['password']),
            'tipo'  =>$request['tipo'],
            'dpto'=>$request['dpto'],
            'estado'=>$request['estado'],
            'activaInstalacion'          =>$request['activaInstalacion'],
            'activaRetiro'=>$request['activaRetiro'],
            'activaAsitencia'   =>$request['activaAsitencia'],
            'activaCoordinacion'         =>$request['activaCoordinacion'],
            'activaCentralizacion'        =>$request['activaCentralizacion'],
            'activaDigitacion'        =>$request['activaDigitacion'],
           
            ]);
        $usu->save();
                
        Session::flash('message','Usuario Actualizado');
        
        return Redirect::to('/user');
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
