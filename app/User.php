<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nif', 'nombre', 'apellido1', 'apellido2', 'nick', 'password', 'role',
        'email', 'image', 'telefono', 'departamento', 'fecha', 'activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Indicamos la Tabla con la que se relacionara
    protected $table = 'users';

    // Relacion Uno a Muchos
    public function incidencias(){
        return $this->hasMany('App\Incidencia');
    }

    // Relacion Uno a Muchos
    public function mensajes(){
        return $this->hasMany('App\Mensaje');
    }

    // Relacion Uno a Muchos
    public function logs(){
        return $this->hasMany('App\Log');
    }
}
