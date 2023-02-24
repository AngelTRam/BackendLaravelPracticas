<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductosController extends Controller
{
    //
    public function obtener(){
        $productos = Productos::all();
        return response($productos,200);
    }

    public function crear(Request $request){
        $datos = $request->validate([
            'nombre'=>'required|string',
            'precio'=>'required|numeric',
            'cantidad'=>'required|numeric',
            'descripcion'=>'required|string'
        ]);
        $producto = Productos::create($datos);
        return(response(
            ['message'=>'se creo el nuevo producto con el id: ',$producto['id']],
            201
        ));
    }

    public function modificar($id,Request $request){
        $producto = Productos::find($id);

        if(!$producto){
            return(response(['message'=>'No se encontro el producto con el id: '.$id]));
        }

        $datos = $request->validate([
            'nombre'=>'required|string',
            'precio'=>'required|numeric',
            'cantidad'=>'required|numeric',
            'descripcion'=>'required|string'
        ]);

        $producto->update($datos);
        return(response(['message'=>'El producto se modifico satisfactoriamente']));
    }
}
