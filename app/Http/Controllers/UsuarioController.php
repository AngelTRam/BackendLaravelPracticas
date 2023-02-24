<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    public function obtener(){
        //todos los usuarios
        $usuarios = Usuario::all();


        //todos los usuarios pagimados
        //$usuarios = Usuario::paginate(10);

        //Cuenta los usuarios en la base de datos
        //$usuarios = Usuario::count();

        //Solo toma los usuarios que le indico
        //$usuarios = usuario::all()->take(12);

        //Toma los usuarios pero solo los campos que le indico
        //$usuarios = Usuario::select('id','nombre','email')
        //->get()
        //->take(5);

        //obtener de la BD con condiciones, estas deben llevar siempre get
        //$usuarios = Usuario::where('peso','>=',100)->get();
        //get() cuando son muchos datos y first() cuando solo se necesita un dato

        //obtener un usuario por su id
        //$usuarios = Usuario::where('id','=',10)->first();

        //dos condiciones
        // $usuarios = Usuario::where('id','>',15)
        //                     ->where('peso','>',85)
        //                     ->get();

        //or
        // $usuarios = Usuario::where('id','>',15)
        //                     ->orwhere('peso','>',85)
        //                     ->get();

        //orderby
        //$usuarios = Usuario::orderBy('peso','asc')->get();
        return $usuarios;
    }

    public function crear(Request $request){

        //$datos = $request->all();
        $datos -> $request->validate($this->validateData());
        $usuario = Usuario::create($datos);

        return response(
            ['message'=>'se creo el registro.',
            'id'=> $usuario['id']],
            201
        );
    }

    public function modificar($id,Request $request){

        #VALIDACION DE QUE EXISTE EL USUARIO
        #if($usuario == null) es lo mismo que lo de abajo
        $usuario = Usuario::find($id);
        if(!$usuario){
            return(response(['message'=>'no se encontro el usuario ' .$id],404));
        }
        #VALIDACION DE DATOS
        $datos -> $request->validate($this->validateData());

        $usuario->update($datos);
        return(response(['message'=>'se modifico correctamente el usuaro']));

    }

    public function borrar($id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            return(response(['message'=>'no se encontro el usuario ' .$id],404));
        }
        $usuario->delete();

        return response(
            ['message'=>'Se elimino con exito el usuario']
        );
    }


    private function validateData(){
        return[
            $datos = $request->validate([
                'nombre'=>'required|string',
                'email'=>'required|email',
                'password'=>'required|min:6',
                'peso'=>'required|numeric',
            ])
        ];
    }
}
