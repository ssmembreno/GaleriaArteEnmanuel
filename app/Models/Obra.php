<?php

namespace App\Models;

use App\Models\Comentario;
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

    //Relaciones a las tablas de artistas, tipoObras , imagenes_obra
    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }

    public function tipoObra()
    {
        return $this->belongsTo(TipoObra::class);
    }

    public function imagenes(){
        return $this->hasMany(ImagenObra::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function valoraciones(){
        return $this->hasMany(Valoracion::class);
    }

    public function favoritos(){
        return $this->belongsToMany(User::class, 'favoritos', 'obra_id', 'user_id');
    }

    public function comentarioAprobado(){
        return $this->hasMany(Comentario::class)->where('status', true);
    }
}
