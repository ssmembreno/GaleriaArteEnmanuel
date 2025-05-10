<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';

    protected $fillable = ['id', 'nombre'];

    public function obras(){

        return $this->hasMany(Obra::class);
    }
}
