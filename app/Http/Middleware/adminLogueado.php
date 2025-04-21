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
    public function handle(Request $request, Closure $next, $acceso): Response{

        if(!Auth::check()){
            return redirect()->route('admin.home');
        }
        $user = Auth::user();
        if($acceso ==  1 && $user->rol !== 'admin'){
            abort(403,'Acceso no autorizado');
        }
        return $next($request);
    }
}
