<?php

namespace App\Http\Controllers\Models;

use App\Models\Obra;
use App\Models\TipoObra;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function home(){
        $obras = Obra::latest()->take(7)->get();
        return view('home', compact('obras'));
    }

    public function galeria(){
        $obras = \App\Models\Obra::all();
        $generoObras = \App\Models\Genero::all();
        $tiposObra = \App\Models\TipoObra::all();

        return view('galery.galeryArt', compact('obras', 'generoObras', 'tiposObra'));
    }

    public function filtrarObras(Request $request)
    {
        $hayFiltros = $request->filled('genero') ||
            $request->filled('tecnica') ||
            $request->filled('valoracion') ||
            $request->min_price > 0 ||
            $request->max_price < 5000;

        $query = Obra::query();

        if ($hayFiltros) {
            if ($request->filled('genero')) {
                $query->where('genero_id', $request->genero);
            }

            if ($request->filled('min_price') && $request->min_price > 0) {
                $query->where('precio', '>=', $request->min_price);
            }

            if ($request->filled('max_price') && $request->max_price < 5000) {
                $query->where('precio', '<=', $request->max_price);
            }

            if ($request->filled('tecnica')) {
                $query->where('tipo_obra_id', $request->tecnica);
            }

            if ($request->filled('valoracion')) {
                $query->whereHas('comentarios', function ($q) use ($request) {
                    $q->havingRaw('AVG(puntuacion) >= ?', [$request->valoracion]);
                });
            }
        }

        // Siempre ordenar por más recientes
        $obras = $query->orderBy('created_at', 'desc')->paginate(30);

        return view('galery.CardsImagesArt', compact('obras'))->render();
    }
}
