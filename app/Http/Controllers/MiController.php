<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MiController extends Controller{
    public function prueba(){
        return 'estoy en un controlador';
    }

    public function comer(){
        return 'No estoy comiendo';
    }
    public function saludo($nombre){
        return 'mi nombre es: ' . $nombre;
    }

}
