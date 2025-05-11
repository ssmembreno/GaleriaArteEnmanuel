<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\EventoRequest;
use App\Models\evento;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EventosController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::orderBy('fecha', 'desc')->get();
        return view('admin.eventos.eventos', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Eventos.crearEvento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request)
    {
        //Obtiene todos los datos exepto la imagen
        $datos = Arr::except($request->validated(),['imagen',]);

        //verificamos si el request contiene un archivo en campo imagen y la almacenamos en storage/public
        if($request->hasFile('imagen')){
            $storageLink = $request->file('imagen')->store('eventos', 'public');
            $datos['imagen'] = $storageLink;
        }

        evento::create($datos);

        return redirect()->route('eventos.create')->with('success', 'Evento creado correctamente.');
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
        $evento = Evento::findOrFail($id);
        return view('admin.Eventos.editarEvento', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, string $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($request->validated());

        return redirect()->route('evento.index')->with('success', 'Evento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eventos = Evento::findOrFail($id);
        $eventos->delete();
        return redirect()->route('evento.index')->with('success', 'Evento eliminado correctamente.');
    }
}
