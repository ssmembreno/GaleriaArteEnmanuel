<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artista extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function obras()
    {
        return $this->hasMany(Obra::class);
    }
}
