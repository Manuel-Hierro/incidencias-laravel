<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    // Indicamos la Tabla con la que se relacionara
    protected $table = 'mensajes';

    // Relacion de Muchos a Uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
