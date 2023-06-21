<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xml extends Model
{
    use HasFactory;
    protected $table = "concentrado";
    // Aqui definimos el nombre de la tabla.
    protected $primaryKey = "id";
    // Aqui definimos la llave primaria.
    protected $fillable = [
        'id',       
        'fecha',       
        'rfc',       
        'razon_social',       
        'producto',
        'importe'       
    ];

}
