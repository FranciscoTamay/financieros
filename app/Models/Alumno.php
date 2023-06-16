<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    protected $fillable = [
        'nombres',
        'apellido_p',
        'apellido_m',
        'grado',
        'grupo',
        'carrera',
        'matricula',
        'turno',
    ];
}
