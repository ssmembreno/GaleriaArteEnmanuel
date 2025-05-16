<?php

namespace App\Http\Middleware;

use App\Models\Visitas;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class visitasUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Excluir rutas del admin
        if ($request->is('admin/*')) {
            return $next($request);
        }

        $ip = $request->ip();

        if (!Visitas::where('ip', $ip)->exists() && $ip !== '127.0.0.1') {
            $response = Http::get("http://ip-api.com/json/{$ip}");

            if ($response->successful() && $response['status'] === 'success') {
                Visitas::create([
                    'ip' => $ip,
                    'pais' => $response['country'] ?? 'Desconocido',
                ]);
            }
        }

        return $next($request);
    }

}
