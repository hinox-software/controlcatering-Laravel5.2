<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Session;
use Auth;
use Redirect;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    //use  ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function authenticated($request, $user)
    {
        /*if($user->role === 'admin') {
            return redirect()->intended('/admin_path_here');
        }*/
        
        Session::put('dptoseleccionado',Auth::user()->dpto);

        return redirect()->intended('/home');
    }

    protected function create(array $data)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tipo' => $data['tipo'],
            'dpto' => $data['dpto'],
            'estado' => $data['estado'],
            'activaInstalacion' => $data['activaInstalacion'],
            'activaRetiro' => $data['activaRetiro'],
            'activaAsitencia' => $data['activaAsitencia'],
            'activaCoordinacion' => $data['activaCoordinacion'],
            'activaCentralizacion' => $data['activaCentralizacion'],
            'activaDigitacion' => $data['activaDigitacion'],
        ]); */
        return false;
    }
}
