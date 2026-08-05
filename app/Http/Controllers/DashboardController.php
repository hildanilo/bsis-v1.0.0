<?php

namespace App\Http\Controllers;

use App\Models\AssemblyOrder;
use App\Models\AssistanceOrder;
use App\Models\Customer;
use App\Models\Fitter;
use App\Models\Store;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMontagens = AssemblyOrder::count();
        $montagensPendentes = AssemblyOrder::where('status', 'pendente')->count();
        $montagensEmAndamento = AssemblyOrder::where('status', 'em_montagem')->count();
        $assistenciasPendentes = AssistanceOrder::where('status', 'pendente')->count();
        $totalClientes = Customer::count();
        $totalMontadores = Fitter::where('status', true)->count();
        $totalLojas = Store::where('status', true)->count();

        $fichasRecentes = AssemblyOrder::with(['customer', 'store', 'fitter'])
            ->latest()
            ->take(5)
            ->get();

        $assistenciasRecentes = AssistanceOrder::with(['customer', 'store', 'fitter'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalMontagens',
            'montagensPendentes',
            'montagensEmAndamento',
            'assistenciasPendentes',
            'totalClientes',
            'totalMontadores',
            'totalLojas',
            'fichasRecentes',
            'assistenciasRecentes'
        ));
    }
}
