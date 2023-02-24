<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\AlumnoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/saludo/{nombre}/{edad}',function($nombre,$edad){
    return $nombre .' ha sido puto por '.$edad .' anios.';
});

Route::get('/edad/{edad}',function($edad){

    if ($edad <= 100 and $edad >=0) {

        if ($edad >=18){
            return 'Tienes '.$edad .' y eres mayor de edad';
        };

        return 'Tienes ' .$edad .' y eres menor de edad';
    };

    return 'ERROR: Edad imposible';

});

Route::get('/carrito',function(){
    return 'Se obtuvieron los datos del carrito';
});

Route::post('/carrito',function(){
    return 'Se creo un nuevo carrito';
});

Route::put('/carrito',function() {
    return 'Se anadio un nuevo producto en el carrito';
});

Route::delete('/carrito',function(){
    return 'Se borro un carrito';
});

/* creacion de las rutas*/
Route::get('/usuarios', [UsuarioController::class,'obtener']);
Route::post('/usuarios', [UsuarioController::class,'crear']);
Route::put('/usuarios/{id}',[UsuarioController::class,'modificar']);
Route::delete('/usuarios/{id}', [UsuarioController::class,'borrar']);
/* toma el nombre como una ruta y lo imprime en la pagina*/

Route::get('/productos', [ProductosController::class,'obtener']);
Route::post('/productos', [ProductosController::class,'crear']);
Route::put('/productos/{id}', [ProductosController::class,'modificar']);

Route::get('/ventas',[VentaController::class,'obtener']);

Route::get('/alumnos/{matricula}',[AlumnoController::class,'show']);
Route::get('/becados',[AlumnoController::class,'showBecados']);
