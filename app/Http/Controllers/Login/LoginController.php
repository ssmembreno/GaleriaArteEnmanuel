<?php

namespace App\Http\Controllers\Login;
use App\Http\Controllers\Models\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    public function loginForm(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('/');
        }

        return back()->withInput()->withErrors(['email'=> 'Credenciales incorrectas']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
