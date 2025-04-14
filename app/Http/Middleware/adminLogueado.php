<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Backend\AdminController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class adminLogueado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $itsLoged = 0): Response{
        if ($itsLoged) {
            if(Auth::check()){
                return $next($request);
            }
            return redirect()->route('admin.login');
        }

        //Si el usuario no necesita logearse (Ya esta logeado)
        if(!Auth::check()){
            return $next($request);
        }
        return redirect()->route('admin.home');
    }
}
