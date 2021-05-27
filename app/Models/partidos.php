<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partidos extends Model
{
    use HasFactory;

    public function rolesjugadores(){
        return $this->belongsToMany('App\Models\jugadores');
    }

    public function rolesequipos(){
        return $this->belongsToMany('App\Models\equipos');
    }
}
