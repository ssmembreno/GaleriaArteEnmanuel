<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController
{
    public function redirect(){
        return Socialite::driver("google")->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver("google")->user();

        $avatarUrl = $googleUser->getAvatar() ?? 'https://ui-avatars.com/api/?name=' . urlencode($googleUser->getName());

        // Buscar si el usuario ya existe
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Crear nuevo usuario
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'apellido' => $googleUser->getNickname() ?? '',
                'email' => $googleUser->getEmail(),
                'avatar' => $avatarUrl,
                'password' => Hash::make(Str::random(12)),
                'rol' => 'usuario',
            ]);
        } else {
            // Actualizar avatar si inicia sesión de nuevo
            $user->update([
                'avatar' => $avatarUrl,
            ]);
        }

        Auth::login($user);
        return redirect('/');
    }
}
