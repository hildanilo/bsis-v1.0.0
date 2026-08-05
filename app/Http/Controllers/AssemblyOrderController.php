<?php

namespace App\Http\Controllers;

use App\Models\AssemblyOrder;
use App\Models\AssemblyOrderItem;
use App\Models\Customer;
use App\Models\Fitter;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssemblyOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = AssemblyOrder::with(['store', 'customer', 'fitter']);

        if ($request->filled('store_id')) {
            $query->where('store_id', $request->store_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where(function ($q) use ($busca) {
                $q->where('numero_controle', 'like', "%{$busca}%")
                  ->orWhereHas('customer', function ($cq) use ($busca) {
                      $cq->where('nome', 'like', "%{$busca}%")
                        ->orWhere('cpf_cnpj', 'like', "%{$busca}%");
                  });
            });
        }

        $fichas = $query->latest()->paginate(15)->withQueryString();
        $lojas = Store::where('status', true)->get();

        return view('assembly_orders.index', compact('fichas', 'lojas'));
    }

    public function create()
    {
        $lojas = Store::where('status', true)->get();
        $clientes = Customer::orderBy('nome')->get();
        $montadores = Fitter::where('status', true)->orderBy('nome')->get();
        $produtos = Product::orderBy('descricao')->get();

        return view('assembly_orders.create', compact('lojas', 'clientes', 'montadores', 'produtos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'customer_id' => 'required|exists:customers,id',
            'fitter_id' => 'nullable|exists:fitters,id',
            'numero_controle' => 'nullable|string|max:50',
            'data_montagem' => 'nullable|date',
            'status' => 'required|string',
            'observacoes' => 'nullable|string',
            'itens' => 'required|array|min:1',
            'itens.*.descricao' => 'required|string',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valor_unitario' => 'required|numeric|min:0',
            'itens.*.cor' => 'nullable|string',
            'itens.*.product_id' => 'nullable|exists:products,id',
        ]);

        DB::transaction(function () use ($validated, &$ficha) {
            $valorTotal = 0;
            foreach ($validated['itens'] as $item) {
                $valorTotal += $item['quantidade'] * $item['valor_unitario'];
            }

            $ficha = AssemblyOrder::create([
                'numero_controle' => $validated['numero_controle'],
                'store_id' => $validated['store_id'],
                'customer_id' => $validated['customer_id'],
                'fitter_id' => $validated['fitter_id'] ?? null,
                'user_id' => auth()->id(),
                'status' => $validated['status'],
                'data_montagem' => $validated['data_montagem'] ?? null,
                'valor_total' => $valorTotal,
                'observacoes' => $validated['observacoes'] ?? null,
            ]);

            foreach ($validated['itens'] as $item) {
                AssemblyOrderItem::create([
                    'assembly_order_id' => $ficha->id,
                    'product_id' => $item['product_id'] ?? null,
                    'descricao' => $item['descricao'],
                    'quantidade' => $item['quantidade'],
                    'valor_unitario' => $item['valor_unitario'],
                    'cor' => $item['cor'] ?? null,
                ]);
            }
        });

        return redirect()->route('fichas.show', $ficha->id)
            ->with('success', 'Ficha de Móveis criada com sucesso!');
    }

    public function show($id)
    {
        $ficha = AssemblyOrder::with(['store', 'customer', 'fitter', 'user', 'items.product'])->findOrFail($id);

        return view('assembly_orders.show', compact('ficha'));
    }

    public function edit($id)
    {
        $ficha = AssemblyOrder::with('items')->findOrFail($id);
        $lojas = Store::where('status', true)->get();
        $clientes = Customer::orderBy('nome')->get();
        $montadores = Fitter::where('status', true)->orderBy('nome')->get();
        $produtos = Product::orderBy('descricao')->get();

        return view('assembly_orders.edit', compact('ficha', 'lojas', 'clientes', 'montadores', 'produtos'));
    }

    public function update(Request $request, $id)
    {
        $ficha = AssemblyOrder::findOrFail($id);

        $validated = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'customer_id' => 'required|exists:customers,id',
            'fitter_id' => 'nullable|exists:fitters,id',
            'numero_controle' => 'nullable|string|max:50',
            'data_montagem' => 'nullable|date',
            'status' => 'required|string',
            'observacoes' => 'nullable|string',
            'itens' => 'required|array|min:1',
            'itens.*.descricao' => 'required|string',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valor_unitario' => 'required|numeric|min:0',
            'itens.*.cor' => 'nullable|string',
            'itens.*.product_id' => 'nullable|exists:products,id',
        ]);

        DB::transaction(function () use ($ficha, $validated) {
            $valorTotal = 0;
            foreach ($validated['itens'] as $item) {
                $valorTotal += $item['quantidade'] * $item['valor_unitario'];
            }

            $ficha->update([
                'numero_controle' => $validated['numero_controle'],
                'store_id' => $validated['store_id'],
                'customer_id' => $validated['customer_id'],
                'fitter_id' => $validated['fitter_id'] ?? null,
                'status' => $validated['status'],
                'data_montagem' => $validated['data_montagem'] ?? null,
                'valor_total' => $valorTotal,
                'observacoes' => $validated['observacoes'] ?? null,
            ]);

            $ficha->items()->delete();

            foreach ($validated['itens'] as $item) {
                AssemblyOrderItem::create([
                    'assembly_order_id' => $ficha->id,
                    'product_id' => $item['product_id'] ?? null,
                    'descricao' => $item['descricao'],
                    'quantidade' => $item['quantidade'],
                    'valor_unitario' => $item['valor_unitario'],
                    'cor' => $item['cor'] ?? null,
                ]);
            }
        });

        return redirect()->route('fichas.show', $ficha->id)
            ->with('success', 'Ficha atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $ficha = AssemblyOrder::findOrFail($id);
        $ficha->delete();

        return redirect()->route('fichas.index')
            ->with('success', 'Ficha excluída com sucesso!');
    }

    public function print($id)
    {
        $ficha = AssemblyOrder::with(['store', 'customer', 'fitter', 'user', 'items'])->findOrFail($id);

        return view('assembly_orders.print', compact('ficha'));
    }
}
