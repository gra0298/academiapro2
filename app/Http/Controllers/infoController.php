<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class infoController extends Controller
{
    public function info(){
        return view('varios.nosotros');
    }


}

