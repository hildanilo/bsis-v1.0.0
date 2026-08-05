<?php

namespace App\Http\Controllers;

use App\Models\AssemblyOrder;
use App\Models\Closure;
use App\Models\Fitter;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClosureController extends Controller
{
    public function index()
    {
        $fechamentos = Closure::with(['store', 'fitter'])->latest()->paginate(15);
        $lojas = Store::where('status', true)->get();
        $montadores = Fitter::where('status', true)->get();

        return view('closures.index', compact('fechamentos', 'lojas', 'montadores'));
    }

    public function create()
    {
        $lojas = Store::where('status', true)->get();
        $montadores = Fitter::where('status', true)->get();

        return view('closures.create', compact('lojas', 'montadores'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'fitter_id' => 'required|exists:fitters,id',
            'periodo_inicio' => 'required|date',
            'periodo_fim' => 'required|date|after_or_equal:periodo_inicio',
        ]);

        DB::transaction(function () use ($validated, &$fechamento) {
            // Buscar fichas de montagem no período sem fechamento associado
            $fichas = AssemblyOrder::where('store_id', $validated['store_id'])
                ->where('fitter_id', $validated['fitter_id'])
                ->whereNull('closure_id')
                ->whereBetween('created_at', [$validated['periodo_inicio'] . ' 00:00:00', $validated['periodo_fim'] . ' 23:59:59'])
                ->get();

            $valorTotal = $fichas->sum('valor_total');

            $fechamento = Closure::create([
                'store_id' => $validated['store_id'],
                'fitter_id' => $validated['fitter_id'],
                'periodo_inicio' => $validated['periodo_inicio'],
                'periodo_fim' => $validated['periodo_fim'],
                'valor_total' => $valorTotal,
                'status' => 'fechado',
            ]);

            foreach ($fichas as $ficha) {
                $ficha->update(['closure_id' => $fechamento->id]);
            }
        });

        return redirect()->route('fechamentos.show', $fechamento->id)
            ->with('success', 'Fechamento realizado com sucesso!');
    }

    public function show($id)
    {
        $fechamento = Closure::with(['store', 'fitter', 'assemblyOrders.customer'])->findOrFail($id);

        return view('closures.show', compact('fechamento'));
    }

    public function print($id)
    {
        $fechamento = Closure::with(['store', 'fitter', 'assemblyOrders.customer'])->findOrFail($id);

        return view('closures.print', compact('fechamento'));
    }
}
