<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $lojas = Store::orderBy('nome')->paginate(15);

        return view('stores.index', compact('lojas'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'endereco' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:20',
        ]);

        $validated['status'] = $request->has('status');

        Store::create($validated);

        return redirect()->route('lojas.index')
            ->with('success', 'Loja cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $loja = Store::findOrFail($id);

        return view('stores.edit', compact('loja'));
    }

    public function update(Request $request, $id)
    {
        $loja = Store::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'endereco' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:20',
        ]);

        $validated['status'] = $request->has('status');

        $loja->update($validated);

        return redirect()->route('lojas.index')
            ->with('success', 'Loja atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $loja = Store::findOrFail($id);
        $loja->delete();

        return redirect()->route('lojas.index')
            ->with('success', 'Loja excluída com sucesso!');
    }
}
