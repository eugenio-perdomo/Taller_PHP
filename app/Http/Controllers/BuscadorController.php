<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function buscar(Request $r){
        
        return $r->search;
    }
}
