<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $table='eventos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'ubicacion',
        'imagen',
        'hora_inicio',
        'hora_fin',
        'estado',
    ];
}
