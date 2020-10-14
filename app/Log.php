<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    // Indicamos la Tabla con la que se relacionara
    protected $table = 'logs';

    // Relacion de Muchos a Uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
