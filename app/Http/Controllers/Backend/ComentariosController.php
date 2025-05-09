<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Models\Controller;
use App\Http\Requests\ComentsRequest;
use App\Models\Comentario;
use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obras = Obra::with(['comentarios.user'])->get();
        return view('admin.comentarios.HomeComentarios',compact('obras'));
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
        $comentario = new Comentario();
        $comentario->contenido = $request->contenido;
        $comentario->obra_id = $obraId;
        $comentario->user_id = auth()->id();
        $comentario->save();

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
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect()->back()->with('succes','Comentario eliminado');
    }

    public function aprobar($id){

        $comentario = Comentario::findOrFail($id);
        $comentario->status = 1;
        $comentario->save();

        return redirect()->back()->with('succes','Comentario aprobado');
    }
}
