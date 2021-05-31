<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'nacionalidad',
        'fnacimiento'
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Partido');
    }

    public function eqiopo(){
        return $this->belongsTo('App\Models\Equipo');
    }
}
