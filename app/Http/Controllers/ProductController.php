<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where('descricao', 'like', "%{$busca}%")
                  ->orWhere('codigo', 'like', "%{$busca}%");
        }

        $produtos = $query->orderBy('descricao')->paginate(15)->withQueryString();

        return view('products.index', compact('produtos'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'nullable|string|max:50',
            'descricao' => 'required|string|max:255',
            'valor_padrao' => 'required|numeric|min:0',
            'cor' => 'nullable|string|max:50',
        ]);

        Product::create($validated);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Product::findOrFail($id);

        return view('products.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Product::findOrFail($id);

        $validated = $request->validate([
            'codigo' => 'nullable|string|max:50',
            'descricao' => 'required|string|max:255',
            'valor_padrao' => 'required|numeric|min:0',
            'cor' => 'nullable|string|max:50',
        ]);

        $produto->update($validated);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Product::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
