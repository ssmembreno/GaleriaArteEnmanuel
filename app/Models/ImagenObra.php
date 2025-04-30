<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImagenObra extends Model
{
    use HasFactory;

    protected $table = 'imagenes_obras';

    protected $fillable = ['ruta_imagen', 'obra_id','orden'];

    public function obra(){
        return $this->belongsTo(Obra::class);
    }

}
