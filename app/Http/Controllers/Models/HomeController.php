<?php

namespace App\Http\Controllers\Models;

use App\Models\Obra;
use App\Models\TipoObra;
use Illuminate\Http\Request;
class homeController extends Controller
{
    public function home(){
        $obras = Obra::with('tipoObra')->get();
        $tiposObra = TipoObra::all();
        return view('home', compact('tiposObra','obras'));
    }

    public function galeria(){
        $obras = \App\Models\Obra::all();
        return view('galery.galeryArt', compact('obras'));
    }

    public function filtrarObras(Request $request){
        $query = Obra::query();

        if ($request->filled('tipo_obra')) {
            $query->where('tipo_obra', $request->tipo_obra);
        }

        if ($request->filled('min_price')) {
            $query->where('precio', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('precio', '<=', $request->max_price);
        }

        if ($request->filled('tecnica')) {
            $query->where('tipo_obra_id', $request->tecnica);
        }

        if ($request->filled('valoracion')) {
            $query->whereHas('valoraciones', function ($q) use ($request) {
                $q->havingRaw('AVG(puntuacion) >= ?', [$request->valoracion]);
            });
        }

        $obras = $query->get();

        return view('components.cardsList', compact('obras'))->render();

    }
}
