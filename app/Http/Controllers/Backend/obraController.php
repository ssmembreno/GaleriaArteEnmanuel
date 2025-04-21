<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrearObraRequest;
use App\Http\Requests\EditObras;
use App\Models\Artista;
use App\Models\tipoObra;
use Illuminate\Http\Request;
use App\Models\Obra;

class obraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $obras = Obra::all();
        return view('admin.Obras.index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artistas = Artista::all();
        $tiposObra = TipoObra::all();
        return view('admin.obras.create',compact('artistas','tiposObra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearObraRequest $request)
    {
        $obra = new Obra();
        $obra->nombre = $request->input('nombre');
        $obra->descripcion = $request->input('descripcion');
        $obra->tecnica = $request->input('tecnica');
        $obra->tamaño = $request->input('tamaño');
        $obra->precio = $request->input('precio');
        $obra->estado = $request->input('estado');
        $obra->imagen = $request->input('imagen');
        $obra->artista_id = $request->input('artista_id');
        $obra->tipo_obra_id = $request->input('tipo_obra_id');
        $obra->save();
        return redirect()->route('obras.index')-> with('success','Obra creada correctamente');
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
        $obra = \App\Models\Obra::find($id);

        $artistas = Artista::all();
        $tiposObra = TipoObra::all();

        if (!$obra) {
            abort(404);
        }

        return view('admin.Obras.edit', compact('obra','artistas','tiposObra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditObras $request, string $id)
    {

        $obra = \App\Models\Obra::find($id);
        if (!$obra) {
            abort(404);
        }else{
            $obra->update($request->all());
            return redirect()->route('obras.index',$obra -> id)-> with('success','Obra actualizada correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obra = Obra::find($id);

        if (!$obra) {
            abort(404);
        }
        $obra->delete();
        return redirect()->route('obras.index')->with('success','Obra eliminada correctamente');
    }
}
