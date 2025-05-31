<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Models\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerFormlog(Request $request)
    {
        // Guarda la URL actual si viene como 'intended'
        if ($request->has('intended')) {
            session(['url.intended' => $request->input('intended')]);
        }

        return view('auth.login', ['isRegistering' => true]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        auth()->login($user);

        return redirect()->intended('/');
    }
}
