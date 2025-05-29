<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    //use HasFactory;
    protected $table = 'Solicitud'; // especificamos el nombre de la tabla en la base de datos
    protected $fillable = [
        'titulo',
        'descripcion',
        'tema',
        'area',
        'estado',
        'observaciones',
        'usuario_externo'
    ];
}
