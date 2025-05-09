<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['contenido', 'user_id', 'obra_id'];

    public function obra(){
        return $this->belongsTo(Obra::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
