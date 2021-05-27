<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    use HasFactory;

    public function rolesligas(){
        return $this->belongsToMany('App\Models\ligas');
    }

    public function rolespartidos(){
        return $this->belongsToMany('App\Models\partidos');
    }

    public function integrantes(){
        return $this->hasMany('App\Models\jugadores');
    }
}
