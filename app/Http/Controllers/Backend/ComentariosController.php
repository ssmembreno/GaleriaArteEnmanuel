<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Models\Controller;
use App\Http\Requests\ComentsRequest;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
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
    public function store(ComentsRequest $request,$obraId)
    {
        Comentario::create([
           'contenido' => $request->input('contenido'),
            'user_id' => Auth::id(),
            'obra_id' => $obraId
        ]);

        return redirect()->back()->with('succes','Comentario agregado');
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
