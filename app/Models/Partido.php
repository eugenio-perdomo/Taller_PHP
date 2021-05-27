<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    public function rolesjugadores(){
        return $this->belongsToMany('App\Models\Jugador');
    }

    public function rolesequipos(){
        return $this->belongsToMany('App\Models\Equipo');
    }
}
