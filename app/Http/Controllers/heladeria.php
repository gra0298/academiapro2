<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class heladeria extends Controller
{
    function helado($tHelado){
        if (is_numeric($tHelado)){
            if ($tHelado==1){
                $valor = 500;
                $tipoHelado = 'Chocolate';
            }
            else if($tHelado==2){
                $valor = 1000;
                $tipoHelado = 'Brownie';
            }
            else if($tHelado==3){
                $valor = 1500;
                $tipoHelado = 'Delicatessen';

            }
            else{
                return 'error. la opcion ingresada no existe';
            }
            $resultado = 3000 + $valor;
            $fin = 'El topping escogido es ' .$tipoHelado . ' y su precio es ' . $valor . '<br>El valor total del helado es: ' . $resultado;
            return $fin;
        }
        else{
            return 'el valor no es numerico. error';
        }

        }


}
