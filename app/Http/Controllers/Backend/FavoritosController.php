<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Models\Controller;
use App\Models\Obra;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $obras = Obra::filtrosAplicados($request)->get();

        $favoritosIds = [];

        if (auth()->check()) {
            $favoritosIds = auth()->user()->favoritos()->pluck('obra_id')->toArray();
        }

        return view('galery.ObrasArte', compact('obras', 'favoritosIds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function toggle(Obra $obra)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        if ($user->favoritos()->where('obra_id', $obra->id)->exists()) {
            $user->favoritos()->detach($obra->id);
            return response()->json(['favorito' => false]);
        } else {
            $user->favoritos()->attach($obra->id);
            return response()->json(['favorito' => true]);
        }
    }

}
