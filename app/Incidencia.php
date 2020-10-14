<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    // Indicamos la Tabla de la Base de Datos con la que relacionamos este Modelo
    protected $table = 'incidencias';    

    /* De Muchos a Uno */
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
