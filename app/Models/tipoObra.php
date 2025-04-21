<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tipoObra extends Model
{
    use HasFactory;

    protected $table = 'tipo_obras'; // Importante nombre singular por convención
    protected $fillable = ['nombre', 'descripcion'];

    public function obras()
    {
        return $this->hasMany(Obra::class);
    }
}
