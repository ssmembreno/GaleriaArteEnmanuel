<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si la URL tiene ?lang, actualizar la sesión
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            if (in_array($locale, ['es', 'en'])) {
                Session::put('locale', $locale);
            }
        }

        // Usar el idioma de la sesión, o el por defecto
        App::setLocale(Session::get('locale', config('app.locale')));

        return $next($request);
    }
}
