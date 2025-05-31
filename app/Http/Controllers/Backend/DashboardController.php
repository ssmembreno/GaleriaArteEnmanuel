<?php

namespace App\Http\Controllers\Backend;

use App\Models\Obra;
use App\Models\User;
use App\Models\Visitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController
{
    public function index(){

        $usuarios = User::count();
        $visualizaciones = Visitas::count();

        $visitasPorPais = Visitas::select('pais', DB::raw('count(*) as total'))
            ->groupBy('pais')
            ->orderByDesc('total')
            ->get();

        return view('admin.dashboard', [
            'usuarios' => $usuarios,
            'visualizaciones' => $visualizaciones,
            'visitasPorPais' => $visitasPorPais,
        ]);
    }
}
