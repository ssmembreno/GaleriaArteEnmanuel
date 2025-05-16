<?php

namespace App\Providers;

use App\Models\Visitas;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if (!app()->runningInConsole()) {
            $ip = request()->ip();

            if (!Visitas::where('ip', $ip)->exists() && $ip !== '127.0.0.1') {
                $response = Http::get("http://ip-api.com/json/{$ip}");

                if ($response->successful() && $response['status'] === 'success') {
                    Visitas::create([
                        'ip' => $ip,
                        'pais' => $response['country'] ?? 'Desconocido'
                    ]);
                }
            }
        }
    }
}
