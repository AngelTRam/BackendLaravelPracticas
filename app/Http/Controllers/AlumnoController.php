<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    //
    public function show($matricula){
        //$alumno = Alumno::where('matricula','=',$matricula)->first();
        $alumno = Alumno::find($matricula); //lo mismo que arriba pero chiquito
        return $alumno;
    }

    public function showBecados(){
        $alumnoMbecados = Alumno::where('genero','=','Male')
                        ->where('becado','=','true')
                        ->count();

        $alumnoFbecados = Alumno::where('genero','=','Female')
                        ->where('becado','=','true')
                        ->count();

        $alumnoMNoBecados = Alumno::where('genero','=','Male')
                        ->where('becado','=','false')
                        ->count();

        $alumnoFNobecados = Alumno::where('genero','=','Female')
                        ->where('becado','=','false')
                        ->count();

        return response(['Total_masculinos_becados: ',$alumnoMbecados,
                        'Total_femeninos_becados: ',$alumnoFbecados,
                        'Total_masculinos_no_becados: ',$alumnoMNoBecados,
                        'Total_femeninos_no_becados: ',$alumnoFNobecados]);
    }
}
