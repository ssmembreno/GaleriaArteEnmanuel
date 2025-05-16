<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Models\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Genero;
use App\Models\Obra;
use App\Models\TipoObra;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{

    public function indexObrasAdmin()
    {
        $obras = Obra::orderBy('created_at', 'desc')->paginate(30);
        $tiposObra = TipoObra::all();
        $generoObra = Genero::all();

        return view('admin.Obras.index', compact('obras', 'tiposObra', 'generoObra'));
    }

    public function home(){
        $user = Auth::user();

        return view('admin.home', compact('user'));
    }

    public function login(){
        return view('admin.login');
    }

    public function logear(LoginRequest $request){
        $email = $request->input('email');
        $password = $request->input('password');


        if(Auth::attempt([
            'email'=> $email,
            'password'=> $password
        ])){
            return redirect()->route('admin.home');
        };

        //Si el usuario no se pudo logear
        return redirect()->route('admin.login')->withErrors([
            'login' => 'Usuario y/o contraseña invalidos'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
