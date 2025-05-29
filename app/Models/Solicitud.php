<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    //use HasFactory;
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
