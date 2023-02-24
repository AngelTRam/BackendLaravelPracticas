<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'matricula'; //Cuando las llaves primarias no son id, int etc debe especificarse en el modelo
    protected $keyType = 'string';
    public $incrementing = false;

    use HasFactory;
    }
