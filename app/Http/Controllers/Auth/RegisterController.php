<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'nif' => ['required', 'string', 'max:255', 'unique:users'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido1' => ['required', 'string', 'max:255'],
            'apellido2' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            /* 'role' => ['required', 'string', 'max:255'], */
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            /* 'image' => ['string', 'max:255'], */
            'telefono' => ['required', 'string', 'max:255'],
            'departamento' => ['required', 'string', 'max:255']          
            /* 'fecha' => ['string', 'max:255'], */
            /* 'activo' => ['string', 'max:255'] */
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nif' => $data['nif'],
            'nombre' => $data['nombre'],
            'apellido1' => $data['apellido1'],
            'apellido2' => $data['apellido2'],
            'nick' => $data['nick'],
            'password' => Hash::make($data['password']),
            'role' => 'profesor',
            'email' => $data['email'],
            'image' => $data['image'],
            'telefono' => $data['telefono'],
            'departamento' => $data['departamento'],
            'fecha' => date('Y-m-d H:i:s'),
            'activo' => false               
        ]);
    }
}
