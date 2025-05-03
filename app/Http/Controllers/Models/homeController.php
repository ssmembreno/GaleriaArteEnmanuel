<?php

namespace App\Http\Controllers\Models;

use App\Models\Obra;

class homeController extends Controller
{
    public function home(){
        $obras = Obra::all();
        return view('home', compact('obras'));
    }

    public function galeria(){
        $obras = \App\Models\Obra::all();
        return view('galery.galeryArt', compact('obras'));
    }
}
