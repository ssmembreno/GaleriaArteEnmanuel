<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Obra;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $obras = Obra::all();
        return view('index', compact('obras'));
    }

    public function galeria(){
        $obras = \App\Models\Obra::all();
        return view('galery.galeryArt', compact('obras'));
    }
}
