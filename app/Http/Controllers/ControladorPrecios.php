<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPrecios extends Controller
{
    public function descuento($precio){
        if($precio <0 or is_numeric($precio)==false){
            return 'Error valor ingresado es incorrecto.Intentelo nuevamente';
        }
        else{
            if($precio<100000){
                return 'Este producto no tiene descuento';

            }
            else if ($precio>100000 and $precio<150000){
                return 'El descuento del producto es del 2% , y el total a pagar es: ' . $precio - ($precio*0.02);
            }
            else if ($precio>150000 and $precio<=300000){
                return 'El descuento del producto es del 3%, y el total a pagar es: ' . $precio - ($precio*0.03);
            }
            else if($precio>300000 and $precio<=500000){
                return 'El descuento del producto es del 4%, y el total a pagar es: ' . $precio - ($precio*0.04);

            }
            else if($precio >500000){
                return 'El descuento del producto es del 5%, y el total a pagar es: ' . $precio - ($precio*0.05);
            }
        }
    }


    public function getIVA($nArticulo,$pArticulo){
        //const $iva = 0.19;
        if(is_numeric($pArticulo)==false){
            return 'Error el precio ingresado no es valido';
        }
        define("IVA", 0.19);
        return 'El artículo '. $nArticulo.' sin IVA cuesta ' . $pArticulo. ' y el precio del IVA es ' . IVA .
        '<br> El total a pagar por el artículo es de: ' . $pArticulo + ($pArticulo * IVA);
    }
}
