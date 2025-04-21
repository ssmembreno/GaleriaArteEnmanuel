<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller{
    public function home(){
        return view('admin.home');
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
