<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    //
    public function obtener(){
        $venta = venta::join('usuarios2','ventas.id_usuario','=','usuarios2.id')
            ->join('producto','ventas.id_producto','=','producto.id')
            ->select(
                'ventas.*',
                'usuarios2.nombre as nombre_usuario',
                'producto.nombre as nombre_producto'
            )->get();


        return response($venta,200);
    }
}
