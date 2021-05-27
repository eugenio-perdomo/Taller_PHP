<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jugadores extends Model
{
    use HasFactory;

    public function roles(){
        return $this->belongsToMany('App\Models\partidos');
    }

    public function eqiopo(){
        return $this->belongsTo('App\Models\equipos');
    }
}
