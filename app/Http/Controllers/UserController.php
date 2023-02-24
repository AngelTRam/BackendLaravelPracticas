<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
{
    //
    public function obtener($id)
    {
        $usuarios = Usuario::all();
        return $usuarios;
       //return 'se mostro los usuarios' .$id;
    }
    public function crear()
    {
        return 'se creo otro usuario';
    }
    public function modificar()
    {
        return 'se modifico el usuario';
    }
    public function borrar()
    {
        return 'se elimino el usuario';
    }
}
