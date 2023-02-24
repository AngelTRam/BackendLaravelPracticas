<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'producto';
    protected $fillable = [
        'nombre',
        'precio',
        'cantidad',
        'descripcion',
    ];
    use HasFactory;

}
