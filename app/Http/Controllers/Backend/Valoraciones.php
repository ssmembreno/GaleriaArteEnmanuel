<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Models\Controller;
use App\Http\Requests\ValoracionRequest;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Valoraciones extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ValoracionRequest $request,$ObraId)
    {
        Valoracion::create([
            'user_id' => Auth::id(),
            'obra_id' => $ObraId,
            'calificacion' => $request->input('calificacion'),
            'fecha_valoracion' => date('Y-m-d'),
            'fecha_comentario' => date('Y-m-d'),
        ]);

        return redirect()->back()->with('succes','!Gracias por su valoración :)');
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
}
