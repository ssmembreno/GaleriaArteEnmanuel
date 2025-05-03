<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    protected $table = 'valoraciones';
    //Asignacion masiva
    protected $fillable = ['user_id', 'obra_id','calificacion','fecha_valoracion','fecha_comentario'];

    public function Obra(){
        return $this->belongsTo(obra::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
