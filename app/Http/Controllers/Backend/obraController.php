<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrearObraRequest;
use App\Http\Requests\EditObras;
use App\Models\Artista;
use App\Models\ImagenObra;
use App\Models\tipoObra;
use Illuminate\Http\Request;
use App\Models\Obra;
use PhpParser\Node\Expr\Array_;
use Illuminate\Support\Arr;

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
        $obra->artista_id = $request->input('artista_id');
        $obra->tipo_obra_id = $request->input('tipo_obra_id');

        //Se maneja la subida de la imagen principal
        if($request->hasFile('imagen')){
            $storageLink = $request->file('imagen')->store('obras', 'public');
            $obra->imagen = $storageLink;
        }

        $obra->save();

        //Control de las imagenes multiples en detalles
        if($request->hasFile('imagenes')){
            foreach ($request->file('imagenes') as $key => $imagenAdicional) {
                $storageLink = $imagenAdicional->store('obras', 'public');

                ImagenObra::create([
                    'ruta_imagen' => $storageLink,
                    'obra_id' => $obra->id,
                    'orden' => $key + 1,
                ]);
            }
        }

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
            abort(404,'OBRA NO ENCONTRADA');
        }

        //Se obtiene la informacion del request menos el campo imagen
        $datos = Arr::except($request->validated(),['imagen',]);

        //verificamos si el request contiene un archivo en campo imagen y la almacenamos en storage/public
        if($request->hasFile('imagen')){
            $storageLink = $request->file('imagen')->store('obras', 'public');
            $datos['imagen'] = $storageLink;
        }

        //Se actualizan los datos del request
        $obra->update($datos);

        //Control de multiples imagenes
        if($request->hasFile('imagenes')){
            foreach ($request->file('imagenes') as $key => $imagenAdicional) {
                $storageLink = $imagenAdicional->store('obras', 'public');

                ImagenObra::create([
                    'ruta_imagen' => $storageLink,
                    'obra_id' => $obra->id,
                    'orden' => $key + 1,
                ]);
            }
        }
        return redirect()->route('obras.index')-> with('success','Obra actualizada correctamente');

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
