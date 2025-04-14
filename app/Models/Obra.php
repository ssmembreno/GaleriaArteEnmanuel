<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obra extends Model
{
    use HasFactory;

    protected $table = 'obras'; // (no es obligatorio si el modelo se llama igual que la tabla en plural)

    protected $fillable = [
        'nombre',
        'descripcion',
        'tecnica',
        'precio',
        'tamaño',
        'estado',
        'imagen',
        'artista_id',
        'tipo_obra_id'
    ];
}
