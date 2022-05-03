<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class infoDocentes extends Controller
{
    public function docentes(){
        return view('sobredocentes.index');
    }
    //
}
