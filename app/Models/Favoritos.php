<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    protected $table = 'favoritos';

    protected $fillable = ['user_id','obra_id'];

    public function Obra(){
        return $this->belongsTo(Obra::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
