<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController
{
    public function index(){
        $usuarios = User::all();

        return view('admin.users.userInfo',compact('usuarios'));
    }

    public function edit(string $id){

        $usuarios = User::find($id);

        return view('admin.users.userEdit',compact('usuarios'));
    }

    public function update(Request $request, string $id){
        $request->validate([
            'rol' => 'required',
        ]);
        $usuarios = User::find($id);
        $usuarios->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Rol actualizado correctamente.');

    }


    public function destroy(string $id){
        $usuario = User::findOrFail($id);

        if (!$usuario) {
            abort(404);
        }
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'usuario eliminado correctamente.');
    }
}
