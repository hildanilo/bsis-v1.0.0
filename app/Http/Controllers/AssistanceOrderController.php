<?php

namespace App\Http\Controllers;

use App\Models\AssemblyOrder;
use App\Models\AssistanceOrder;
use App\Models\Customer;
use App\Models\Fitter;
use App\Models\Store;
use Illuminate\Http\Request;

class AssistanceOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = AssistanceOrder::with(['store', 'customer', 'fitter', 'assemblyOrder']);

        if ($request->filled('store_id')) {
            $query->where('store_id', $request->store_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->whereHas('customer', function ($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%");
            });
        }

        $assistencias = $query->latest()->paginate(15)->withQueryString();
        $lojas = Store::where('status', true)->get();

        return view('assistance_orders.index', compact('assistencias', 'lojas'));
    }

    public function create()
    {
        $lojas = Store::where('status', true)->get();
        $clientes = Customer::orderBy('nome')->get();
        $montadores = Fitter::where('status', true)->orderBy('nome')->get();
        $fichas = AssemblyOrder::latest()->take(50)->get();

        return view('assistance_orders.create', compact('lojas', 'clientes', 'montadores', 'fichas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'customer_id' => 'required|exists:customers,id',
            'assembly_order_id' => 'nullable|exists:assembly_orders,id',
            'fitter_id' => 'nullable|exists:fitters,id',
            'status' => 'required|string',
            'defeito' => 'required|string',
            'solucao' => 'nullable|string',
            'data_atendimento' => 'nullable|date',
        ]);

        $assistencia = AssistanceOrder::create($validated);

        return redirect()->route('assistencias.index')
            ->with('success', 'Assistência cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $assistencia = AssistanceOrder::findOrFail($id);
        $lojas = Store::where('status', true)->get();
        $clientes = Customer::orderBy('nome')->get();
        $montadores = Fitter::where('status', true)->orderBy('nome')->get();
        $fichas = AssemblyOrder::latest()->take(50)->get();

        return view('assistance_orders.edit', compact('assistencia', 'lojas', 'clientes', 'montadores', 'fichas'));
    }

    public function update(Request $request, $id)
    {
        $assistencia = AssistanceOrder::findOrFail($id);

        $validated = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'customer_id' => 'required|exists:customers,id',
            'assembly_order_id' => 'nullable|exists:assembly_orders,id',
            'fitter_id' => 'nullable|exists:fitters,id',
            'status' => 'required|string',
            'defeito' => 'required|string',
            'solucao' => 'nullable|string',
            'data_atendimento' => 'nullable|date',
        ]);

        $assistencia->update($validated);

        return redirect()->route('assistencias.index')
            ->with('success', 'Assistência atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $assistencia = AssistanceOrder::findOrFail($id);
        $assistencia->delete();

        return redirect()->route('assistencias.index')
            ->with('success', 'Assistência excluída com sucesso!');
    }
}
